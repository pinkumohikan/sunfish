.PHONY: setup

setup: composer.phar
	./composer.phar install --no-dev --prefer-dist --optimize-autoloader --no-interaction

composer.phar:
	./script/setup-composer.sh

try:
	php bin/try.php

dev:
	php -S 0.0.0.0:8080 -t ./public
