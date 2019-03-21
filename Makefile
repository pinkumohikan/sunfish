.PHONY: docker/* setup try dev

docker/up:
	docker-compose up --d --build

docker/down:
	docker-compose down

docker/logs:
	docker-compose logs -f

docker/ping:
docker/ping:
	test -n "$(docker ps -q)" || echo "container is nothing" && exit 1
	docker exec $(docker ps -q) curl -sSf --retry 5 --retry-connrefused -o /dev/null --dump-header - http://localhost/margin_stocks


setup: composer.phar
	./composer.phar install --no-dev --prefer-dist --optimize-autoloader --no-interaction

composer.phar:
	./script/setup-composer.sh


try:
	php bin/try.php

dev:
	php -S 0.0.0.0:8080 -t ./public
