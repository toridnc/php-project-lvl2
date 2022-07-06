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

namespace Differ\Parsers;

/**
 * Parses files
 *
 * @param string $file File
 *
 * @return array
 */
function parse(string $file): array
{
    if (!file_exists($file)) {
        throw new \Exception('Incorrect file path!');
    }

    $extension = pathinfo($file, PATHINFO_EXTENSION);
    $data = file_get_contents($file);

    if (in_array($extension, ['yml', 'yaml'])) {
        return Yaml::parse($data);
    } elseif ($extension === 'json') {
        return json_decode($data, true);
    } else {
        throw new \Exception('Unknown file extension!');
    }
}
