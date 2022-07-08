<?php

/**
 * Parses files
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

use Symfony\Component\Yaml\Yaml;

/**
 * Parses files
 *
 * @param string $file   File
 * @param string $format File format
 *
 * @return array
 */
function parse(string $file, string $format): array
{
    switch ($format) {
    case 'json':
        return json_decode($file, true);

    case 'yml':
    case 'yaml':
        return Yaml::parse($file);
        // file correct check
    default:
        throw new \Exception("Incorrect file format: $format");
    }
}
