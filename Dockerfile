FROM php:7.3-fpm-alpine

COPY ./docker_files/php/php-fpm.d/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY ./docker_files/php/php/php.ini /usr/local/etc/php/php.ini

RUN apk add --no-cache nginx make
COPY ./docker_files/nginx/ /etc/nginx
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

RUN apk add --no-cache libpng-dev jpeg-dev libzip-dev \
&& docker-php-ext-configure gd --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install gd zip

ENV COMPOSER_ALLOW_SUPERUSER = 1

WORKDIR /workspace
COPY ./ .
RUN make setup
RUN chown -R nginx:nginx *

ENTRYPOINT ["./docker_files/entry_point.sh"]
