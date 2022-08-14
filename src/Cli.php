<?php

/**
 * Run ocopt and generate diff
 *
 * PHP version 7.4
 *
 * @category RunDocopt
 * @package  GenerateDiff
 * @author   toridnc <riadev@inbox.ru>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/toridnc/php-project-lvl2
 */

namespace Differ\Cli;

use Docopt;

/**
 * Run Docopt
 * 
 * @return Docopt
 */
function runDocopt()
{
    $doc = <<<DOC
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

    return Docopt::handle($doc, array('version' => 'Generate diff 1.0'));
}
