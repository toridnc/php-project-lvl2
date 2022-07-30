<?php

/**
 * Formatting to stylish format
 *
 * PHP version 7.4
 *
 * @category StylishFormat
 * @package  Formatters
 * @author   toridnc <toridnc@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/toridnc/php-project-lvl2
 */

namespace Differ\Formatters\Stylish;

const ADDED = '+';
const REMOWED = '-';
const SPACE = ' ';
const TWO_SPACES = '  ';
const FOUR_SPACES = '    ';

/**
 * Formatting to stylish format
 *
 * @param array $diff Alphabetically sorted array with differences
 *
 * @return string
 */
function stylish(array $diff): string
{
    $diffToStylish = buildStylish($diff);
    return '{' . PHP_EOL . implode(PHP_EOL, $diffToStylish) . PHP_EOL . '}';
}

/**
 * Build needed tree
 *
 * @param array $arrayDiff Array diff
 * @param int   $depth     Depth
 *
 * @return array
 */
function buildStylish(array $arrayDiff, int $depth = 0): array
{
    $indent = get_indent($depth);
    $nextDepth = $depth + 1;
    $result = array_map(
        function ($data) use ($indent, $nextDepth): string {
            switch ($data['type']) {
            case 'unchanged':
                $value = $data['value'];
                $formattedValue = toString($value, $nextDepth);
                return "{$indent}" . FOUR_SPACES .
                    "{$data['key']}: {$formattedValue}";

            case 'changed':
                $value1 = $data['value1'];
                $formattedValue1 = toString($value1, $nextDepth);
                $value2 = $data['value2'];
                $formattedValue2 = toString($value2, $nextDepth);
                return "{$indent}" . TWO_SPACES . REMOWED . SPACE .
                    "{$data['key']}: {$formattedValue2}" . PHP_EOL .
                    "{$indent}" . TWO_SPACES . ADDED . SPACE .
                    "{$data['key']}: {$formattedValue1}";

            case 'deleted':
                $value = $data['value'];
                $formattedValue = toString($value, $nextDepth);
                return "{$indent}" . TWO_SPACES . REMOWED . SPACE .
                    "{$data['key']}: {$formattedValue}";

            case 'added':
                $value = $data['value'];
                $formattedValue = toString($value, $nextDepth);
                return "{$indent}" . TWO_SPACES . ADDED . SPACE .
                    "{$data['key']}: {$formattedValue}";

            case 'hasChildren':
                $stringNested = implode(
                    PHP_EOL, formatToStylish(
                        $data['children'],
                        $nextDepth
                    )
                );
                return "{$indent}    {$data['key']}: {" . PHP_EOL .
                        "{$stringNested}" . PHP_EOL . "{$indent}    }";

                // file correct check
            default;
                throw new \Exception("Incorrect type: {$data['type']}");
            }
        }, $arrayDiff
    );
    return $result;
}

/**
 * Get indent
 *
 * @param int $times How many times to repeat
 *
 * @return string
 */
function getIndent(int $times): string
{
    return str_repeat(FOUR_SPACES, $times);
}

/**
 * To string
 *
 * @param mixed $value Value
 * @param int   $depth Depth
 *
 * @return string
 */
function toString($value, int $depth): string
{
    if (is_bool($value)) {
        return $value ? 'true' : 'false';
    }

    if (is_null($value)) {
        return 'null';
    }

    if (is_array($value)) {
        $result = arrayToString($value, $depth);
        $indent = getIndent($depth);
        $bracketsResult = "{{$result}" . PHP_EOL . "{$indent}}";
        return $bracketsResult;
    }

    return "{$value}";
}

/**
 * Array to string
 *
 * @param array $arrayValue Array
 * @param int   $depth      Depth
 *
 * @return string
 */
function arrayToString(array $arrayValue, int $depth): string
{
    $keys = array_keys($arrayValue);
    $inDepth = $depth + 1;
    $result = array_map(
        function ($key) use ($arrayValue, $inDepth): string {
            $val = toString($arrayValue[$key], $inDepth);
            $indent = getIndent($inDepth);
            $result = PHP_EOL . "{$indent}{$key}: {$val}";
            return $result;
        }, $keys
    );
    return implode('', $result);
}
