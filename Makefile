install:
	composer install

composer:
	composer validate
	composer dump-autoload
	composer update

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin tests

test:
	composer exec --verbose phpunit tests