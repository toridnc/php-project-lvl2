<?php

/**
 * Tests for Difference calculator
 *
 * PHP version 7.4
 *
 * @category TestingDifferenceCalculator
 * @package  Tests
 * @author   toridnc <riadev@inbox.ru>
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
 * @author   toridnc <riadev@inbox.ru>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/toridnc/php-project-lvl2
 */
class DifferTest extends TestCase
{
    /**
     * Testing function genDiff in Differ.php
     *
     * @param string $file1    File 1
     * @param string $file2    File 2
     * @param string $expected Expected result
     * @param string $format   Needed format. Default value - 'stylish'
     *
     * @return void
     *
     * @dataProvider conformity
     */
    public function testGenDiff(string $file1, string $file2, string $expected, string $format = 'stylish'): void
    {
        $assertMethod = ($format === 'json')
        ? 'assertJsonStringEqualsJsonFile' : 'assertStringEqualsFile';

        $this->$assertMethod(
            $this->makePathToFixture($expected),
            genDiff($this->makePathToFixture($file1), $this->makePathToFixture($file2), $format)
        );
    }
    /**
     * Testing the received and expected results
     *
     * @return array
     */
    public function conformity(): array
    {
        return [
            'json files' => ['file1.json', 'file2.json', 'expectedJsonYmlYaml.txt'],
            'yml and yaml files' =>
            ['file1.yml', 'file2.yml', 'expectedJsonYmlYaml.txt'],
            'json files to stylish' =>
            ['file-1.json', 'file-2.json', 'expectedStylish.txt'],
            'yaml files to stylish' =>
            ['file-1.yaml', 'file-2.yaml', 'expectedStylish.txt'],
            'yaml files to plain' =>
            ['file-1.yaml', 'file-2.yaml', 'expectedPlain.txt', 'plain'],
            'json files to plain' =>
            ['file-1.json', 'file-2.json', 'expectedPlain.txt', 'plain'],
            'yaml files to json' => ['file-1.yaml', 'file-2.yaml', 'expectedJson.txt', 'json'],
            'json files to json' => ['file-1.json', 'file-2.json', 'expectedJson.txt', 'json']
        ];
    }
    /**
     * Testing the received and expected results
     *
     * @param string $fileName File names
     *
     * @return string
     */
    public function makePathToFixture(string $fileName): string
    {
        $parts = [__DIR__, 'fixtures', $fileName];
        return realpath(implode('/', $parts));
    }
}
