# Difference Calculator Project

##### Hexlet tests and linter status:
[![Actions Status](https://github.com/toridnc/php-project-lvl2/workflows/hexlet-check/badge.svg)](https://github.com/toridnc/php-project-lvl2/actions) [![Linter](https://github.com/toridnc/php-project-lvl2/actions/workflows/run-linter.yml/badge.svg)](https://github.com/toridnc/php-project-lvl2/actions) [![PHPUnit tests](https://github.com/toridnc/php-project-lvl2/actions/workflows/run-phpunit.yml/badge.svg)](https://github.com/toridnc/php-project-lvl2/actions) [![Maintainability](https://api.codeclimate.com/v1/badges/d39162e1ba73dd9a7011/maintainability)](https://codeclimate.com/github/toridnc/php-project-lvl2/maintainability) [![Test Coverage](https://api.codeclimate.com/v1/badges/d39162e1ba73dd9a7011/test_coverage)](https://codeclimate.com/github/toridnc/php-project-lvl2/test_coverage)

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

## Reference information
```sh
bin/gendiff -h
```
```sh
bin/gendiff -v
```

[![asciicast](https://asciinema.org/a/514763.svg)](https://asciinema.org/a/514763)

## Flat file comparison (JSON)
```sh
bin/gendiff tests/fixtures/file1.json tests/fixtures/file2.json
```

[![asciicast](https://asciinema.org/a/514766.svg)](https://asciinema.org/a/514766)

## Flat file comparison (yaml)
```sh
bin/gendiff tests/fixtures/file1.yml tests/fixtures/file2.yml
```

[![asciicast](https://asciinema.org/a/514767.svg)](https://asciinema.org/a/514767)

## Recursive comparison
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

## Plain format
```sh
bin/gendiff --format plain tests/fixtures/file-1.json tests/fixtures/file-2.json
```
```sh
bin/gendiff --format plain tests/fixtures/file-1.yaml tests/fixtures/file-2.yaml
```

[![asciicast](https://asciinema.org/a/514772.svg)](https://asciinema.org/a/514772)

## Output to json
```sh
bin/gendiff --format json tests/fixtures/file-1.json tests/fixtures/file-2.json
```
```sh
bin/gendiff --format json tests/fixtures/file-1.yaml tests/fixtures/file-2.yaml
```

[![asciicast](https://asciinema.org/a/514774.svg)](https://asciinema.org/a/514774)