#!/bin/sh

php-fpm -c /usr/local/etc/php/conf.d/php.ini &

nginx -g 'daemon off;'
