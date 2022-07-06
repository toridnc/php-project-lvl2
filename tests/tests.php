<?php

/**
 * Tests for Difference calculator
 *
 * PHP version 7.4
 *
 * @category TestingDifferenceCalculator
 * @package  Tests
 * @author   toridnc <toridnc@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/toridnc/php-project-lvl2
 */

namespace Differ\Tests;

use PHPUnit\Framework\TestCase;
use function Differ\Differ\genDiff;

/**
 * Testing function genDiff
 *
 * @category TestingDifferenceCalculator
 * @package  Tests
 * @author   toridnc <toridnc@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/toridnc/php-project-lvl2
 */
class DiffTest extends TestCase
{
    /**
     * Test function for genDiff function
     *
     * @return void
     */
    public function testGenDiff(): void
    {
        $expected = file_get_contents(
            __DIR__ . "/fixtures/expected-json-yml-yaml.txt"
        );
        $json1 = __DIR__ . '/../tests/fixtures/file1.json';
        $json2 = __DIR__ . '/../tests/fixtures/file2.json';
        $this->assertEquals($expected, genDiff($json1, $json2));

        $expected = file_get_contents(
            __DIR__ . "/fixtures/expected-json-yml-yaml.txt"
        );
        $yml1 = __DIR__ . '/../tests/fixtures/file1.yml';
        $yml2 = __DIR__ . '/../tests/fixtures/file2.yml';
        $this->assertEquals($expected, genDiff($yml1, $yml2));
    }
}
