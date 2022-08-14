<?php

/**
 * Formatting to json format
 *
 * PHP version 7.4
 *
 * @category JsonFormat
 * @package  Formatters
 * @author   toridnc <riadev@inbox.ru>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/toridnc/php-project-lvl2
 */

namespace Differ\Formatters\Json;

/**
 * Formatting to json format
 *
 * @param array $diff Alphabetically sorted array with differences
 *
 * @return string
 */
function toJson(array $diff): string
{
    return json_encode($diff);
}
