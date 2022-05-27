#!/usr/bin/env php

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

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    include_once $autoloadPath1;
} else {
    include_once $autoloadPath2;
}

const DOC = <<<DOC
Generate diff

Usage:
gendiff (-h|--help)
gendiff (-v|--version)
gendiff [--format <fmt>] <firstFile> <secondFile>

Options:
-h --help                     Show this screen
-v --version                  Show version
--format <fmt>                Report format [default: stylish]

DOC;

Docopt::handle(DOC);