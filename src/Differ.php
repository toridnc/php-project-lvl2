<?php

/**
 * Difference calculator
 *
 * PHP version 7.4
 *
 * @category DifferenceCalculator
 * @package  GenerateDiff
 * @author   toridnc <toridnc@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/toridnc/php-project-lvl2
 */

namespace Differ\Differ;

use function Differ\Parsers\parse;
use function Functional\sort;
use function Differ\Formatters\formatting;

/**
 * Builds a diff with file changes relative to each other
 *
 * @param string $pathToFile1 First file
 * @param string $pathToFile2 Second file
 * @param string $format      Needed format. Default value - 'stylish'
 *
 * @return string
 */
function genDiff(string $pathToFile1, string $pathToFile2, string $format = 'stylish'): string
{
    [$data1, $format1] = getFileData($pathToFile1);
    [$data2, $format2] = getFileData($pathToFile2);
    $firstArray = parse($data1, $format1);
    $secondArray = parse($data2, $format2);
    $diff = compare($firstArray, $secondArray);
    return formatting($diff, $format);
}

/**
 * Read file data
 *
 * @param string $pathToFile File data
 *
 * @return array
 */
function getFileData(string $pathToFile): array
{
    // file existence check
    if (!file_exists($pathToFile)) {
        throw new \Exception("Incorrect path to file: $pathToFile");
    }
    $content = file_get_contents($pathToFile);
    $format = pathinfo($pathToFile, PATHINFO_EXTENSION);
    return [$content, $format];
}

/**
 * Find differences in two files,
 * adds the resultto a new array
 * and alphabetical sorting
 *
 * @param array $file1 First file
 * @param array $file2 Second file
 *
 * @return array
 */
function compare(array $file1, array $file2): array
{
    /**
    * From data arrays we create an array of keys
    */
    $keysFile1 = array_keys($file1);
    $keysFile2 = array_keys($file2);
    $mergeKeys = array_merge($keysFile1, $keysFile2);
    $uniqKeys = array_unique($mergeKeys);
    $sortKeys = sort($uniqKeys, fn ($left, $right) => $left <=> $right);

    $diff = array_map(
        function ($key) use ($file1, $file2) {
            // if the key is only in the #file 1
            if (!array_key_exists($key, $file2)) {
                return [
                    'key' => $key,
                    'value' => $file1[$key],
                    'type' => 'deleted'];
            }
            // if the key is only in the $file2
            if (!array_key_exists($key, $file1)) {
                return [
                    'key' => $key,
                    'value' => $file2[$key],
                    'type' => 'added'];
            }
            // if $file1 and $file2 have same keys with same values
            if ($file1[$key] === $file2[$key]) {
                return [
                    'key' => $key,
                    'value' => $file1[$key],
                    'type' => 'unchanged'];
            }
            // if file has children
            if (is_array($file1[$key]) && is_array($file2[$key])) {
                return [
                    'key' => $key,
                    'children' => compare($file1[$key], $file2[$key]),
                    'type' => 'hasChildren'];
            }
            // if $file1 anf $file2 have same keys but different values
            return [
                'key' => $key,
                'value1' => $file1[$key],
                'value2' => $file2[$key],
                'type' => 'changed'];
        },
        $sortKeys
    );
    return $diff;
}
