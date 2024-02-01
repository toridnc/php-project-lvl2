##### Hexlet tests and linter status:
[![Actions Status](https://github.com/toridnc/php-project-lvl2/workflows/hexlet-check/badge.svg)](https://github.com/toridnc/php-project-lvl2/actions) [![Linter](https://github.com/toridnc/php-project-lvl2/actions/workflows/run-linter.yml/badge.svg)](https://github.com/toridnc/php-project-lvl2/actions) [![PHPUnit tests](https://github.com/toridnc/php-project-lvl2/actions/workflows/run-phpunit.yml/badge.svg)](https://github.com/toridnc/php-project-lvl2/actions) [![Maintainability](https://api.codeclimate.com/v1/badges/d39162e1ba73dd9a7011/maintainability)](https://codeclimate.com/github/toridnc/php-project-lvl2/maintainability) [![Test Coverage](https://api.codeclimate.com/v1/badges/d39162e1ba73dd9a7011/test_coverage)](https://codeclimate.com/github/toridnc/php-project-lvl2/test_coverage)

# Вычислитель отличий
Вычислитель отличий – программа, определяющая разницу между двумя структурами данных, вроде: http://www.jsondiff.com.

Возможности:
* Поддержка разных входных форматов: yaml и json
* Генерация отчета в виде plain text, stylish и json

Написание тестов (PHPUnit) и разработка через них.

# Difference Calculator Project

Difference calculator is a program that determines the difference between two data structures, like: http://www.jsondiff.com.

Opportunities:
* Support for different input formats: yaml and json
* Generating a report in the form of plain text, stylish and json

Writing tests (PHPUnit) and developing through them.

<br>

## Install
```sh
git clone git@github.com:toridnc/php-project-lvl2.git
```
```sh
cd php-project-lvl2
```
```sh
make install
```

<br>

## Вывод справки / Reference information
```sh
bin/gendiff -h
```
```sh
bin/gendiff -v
```

[![asciicast](https://asciinema.org/a/514763.svg)](https://asciinema.org/a/514763)

## Сравнение плоских файлов (JSON) / Flat file comparison (JSON)
```sh
bin/gendiff tests/fixtures/file1.json tests/fixtures/file2.json
```

[![asciicast](https://asciinema.org/a/514766.svg)](https://asciinema.org/a/514766)

## Сравнение плоских файлов (yaml) / Flat file comparison (yaml)
```sh
bin/gendiff tests/fixtures/file1.yml tests/fixtures/file2.yml
```

[![asciicast](https://asciinema.org/a/514767.svg)](https://asciinema.org/a/514767)

## Рекурсивное сравнение / Recursive comparison
```sh
bin/gendiff tests/fixtures/file-1.json tests/fixtures/file-2.json
```
```sh
bin/gendiff tests/fixtures/file-1.yaml tests/fixtures/file-2.yaml
```
```sh
bin/gendiff tests/fixtures/file-1.json tests/fixtures/file-2.yaml
```

[![asciicast](https://asciinema.org/a/514771.svg)](https://asciinema.org/a/514771)

## Плоский формат / Plain format
```sh
bin/gendiff --format plain tests/fixtures/file-1.json tests/fixtures/file-2.json
```
```sh
bin/gendiff --format plain tests/fixtures/file-1.yaml tests/fixtures/file-2.yaml
```

[![asciicast](https://asciinema.org/a/514772.svg)](https://asciinema.org/a/514772)

## Вывод в json / Output to json
```sh
bin/gendiff --format json tests/fixtures/file-1.json tests/fixtures/file-2.json
```
```sh
bin/gendiff --format json tests/fixtures/file-1.yaml tests/fixtures/file-2.yaml
```

[![asciicast](https://asciinema.org/a/514774.svg)](https://asciinema.org/a/514774)
