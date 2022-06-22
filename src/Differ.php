<?php

/**
 * Difference calculator File Doc Comment
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

/**
 * Builds a diff with file changes relative to each other
 * 
 * @param string $pathToFile1 First file
 * @param string $pathToFile2 Second file
 * 
 * @return string
 */
function genDiff(string $pathToFile1, string $pathToFile2): string
{
    $firstArray = parse($pathToFile1);
    $secondArray = parse($pathToFile2);
    return compare($firstArray, $secondArray);
}

/**
 * Parses files
 * 
 * @param string $file File
 * 
 * @return array
 */
function parse(string $file): array
{
    $data = file_get_contents($file);
    return json_decode($data, true);
}

/**
 * Find differences in two files, adds the result to a new array and alphabetical sorting
 * 
 * @param array $file1 First file
 * @param array $file2 Second file
 * 
 * @return array
 */
function compare(array $file1, array $file2): array
{
    $keysFile1 = array_keys($file1);
    $keysFile2 = array_keys($file2);
    $mergeKeys = array_unique(array_merge($keysFile1, $keysFile2));
    $sortKeys = sort($mergeKeys);

    $diff = array_map(function ($key) use ($file1, $file2) {
        if ($file1[$key] === $file2[$key]) { // if $file1 and $file2 have same keys with same values
            return ['key' => $key, 'value' => $file1[$key]];
        } else { // if $file1 and $file2 have same keys but different values
            return ['key' => $key, 'value1' => $file1[$key], 'value2' => $file2[$key]];
        }
        if (!array_key_exists($key, $file2)) { // if the key is only in the $file1 file
            return ['key' => $key, 'value' => $file1[$key]];
        }
        if (!array_key_exists($key, $file1)) { // if the key is only in the $file2 file
            return ['key' => $key, 'value' => $file2[$key]];
        }
    }, $sortKeys);

    return $diff;
}