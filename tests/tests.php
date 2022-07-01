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

namespace Differ\PHPUnit\Tests;

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
        $expected = "{
\t- follow: false
\t  host: hexlet.io
\t- proxy: 123.234.53.22
\t- timeout: 50
\t+ timeout: 20
\t+ verbose: true
}\n";

        $filePath1 = __DIR__ . '/../tests/fixtures/file1.json';
        $filePath2 = __DIR__ . '/../tests/fixtures/file2.json';

        $this->assertEquals($expected, genDiff($firstFilePath, $secondFilePath));
    }
}
