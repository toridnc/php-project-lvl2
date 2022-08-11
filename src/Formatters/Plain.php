<?php

/**
 * Formatting to plain format
 *
 * PHP version 7.4
 *
 * @category PlainFormat
 * @package  Formatters
 * @author   toridnc <toridnc@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/toridnc/php-project-lvl2
 */

namespace Differ\Formatters\Plain;

/**
 * Formatting to plain format
 *
 * @param array $diff Alphabetically sorted array with differences
 *
 * @return string
 */
function plain(array $diff): string
{
    $diffToPlain = buildPlain($diff);
    return implode(PHP_EOL, $diffToPlain);
}

/**
 * Build needed tree
 *
 * @param array  $arrayDiff Array diff
 * @param string $path      Empty line
 *
 * @return array
 */
function buildPlain(array $arrayDiff, string $path = ''): array
{
    $result = array_map(
        function ($data) use ($path): string {
            $property = "{$path}{$data['key']}";
            switch ($data['type']) {
                case 'unchanged':
                    return '';

                case 'changed':
                    $formattedValue1 = toString($data['value1']);
                    $formattedValue2 = toString($data['value2']);
                    return "Property '{$property}' was updated. From {$formattedValue1} to {$formattedValue2}";

                case 'deleted':
                    return "Property '{$property}' was removed";

                case 'added':
                    $formattedValue = toString($data['value']);
                    return "Property '{$property}' was added with value: {$formattedValue}";

                case 'hasChildren':
                    $ancestryPath = "{$path}{$data['key']}.";
                    return implode(
                        PHP_EOL,
                        buildPlain(
                            $data['children'],
                            $ancestryPath
                        )
                    );
                    // file correct check
                default:
                    throw new \Exception("Incorrect data type");
            }
        },
        $arrayDiff
    );

    return array_filter($result);
}

/**
 * To string
 *
 * @param mixed $value Value
 *
 * @return string
 */
function toString($value): string
{
    if (is_bool($value)) {
        return $value ? 'true' : 'false';
    }

    if (is_null($value)) {
        return 'null';
    }

    if (is_array($value)) {
        return '[complex value]';
    }

    if (is_numeric($value)) {
        return "{$value}";
    }

    return "'{$value}'";
}
