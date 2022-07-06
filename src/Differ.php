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

use function Differ\Parsers\parse;

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
    $diff = compare($firstArray, $secondArray);
    return json_encode($diff);
}

/**
 * Find differences in two files,
 * adds the resultto a new array
 * and alphabetical sorting
 *
 * @param array $file1 First file
 * @param array $file2 Second file
 *
 * @return string
 */
function compare(array $file1, array $file2): string
{
    $keys = array_merge($file1, $file2);
    ksort($keys);

    $diff = "{\n";
    foreach ($keys as $key => $value) {
        if (is_bool($value)) {
            // if $file1 and $file2 have same keys with same values
            $value = ($value === true) ? 'true' : 'false';
        }
        if (!key_exists($key, $file2)) {
            // if the key is only in the $file1
            $diff .= "\t- {$key}: {$value}\n";
            continue;
        }
        if (!key_exists($key, $file1)) {
            // if the key is only in the $file2
            $diff .= "\t+ {$key}: {$value}\n";
            continue;
        }
        if ($file1[$key] === $file2[$key]) {
            $diff .= "\t  {$key}: {$value}\n";
            continue;
        }
        // if $file1 and $file2 have same keys but different values
        $diff .= "\t- {$key}: {$file1[$key]}\n";
        $diff .= "\t+ {$key}: {$value}\n";
    }
    $diff .= "}\n";

    return $diff;
}
