.PHONY: docker/* setup try dev

docker/up:
	docker-compose up --d --build

docker/down:
	docker-compose down

docker/logs:
	docker-compose logs -f


setup: composer.phar
	./composer.phar install --no-dev --prefer-dist --optimize-autoloader --no-interaction

composer.phar:
	./script/setup-composer.sh


try:
	php bin/try.php

dev:
	php -S 0.0.0.0:8080 -t ./public

ping:
	curl -sSf http://localhost:8080/margin_stocks -o /dev/null --dump-header -
