<?php

/**
 * Formatting in the need format
 *
 * PHP version 7.4
 *
 * @category Format
 * @package  Formatting
 * @author   toridnc <toridnc@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/toridnc/php-project-lvl2
 */

namespace Differ\Formatters;

/**
 * Builds a diff with file changes relative to each other
 *
 * @param array  $array  diff - result file
 * @param string $format Name of needed format. Default value - 'stylish'
 *
 * @return string
 */
function formatting($array, string $format = 'stylish'): string
{
    switch ($format) {
    case 'stylish':
        return Stylish\stylish($array);
        // file correct check
    default:
        throw new \Exception("Incorrect output format $format");
    }
}
