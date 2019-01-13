FROM php:7.3-fpm-alpine

COPY ./docker_files/php/php-fpm.d/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY ./docker_files/php/php/php.ini /usr/local/etc/php/conf.d/php.ini

RUN apk add --no-cache nginx make
COPY ./docker_files/nginx/ /etc/nginx
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

# NOTE: required by phpoffice/phpspreadsheet
RUN apk add --no-cache libpng-dev jpeg-dev libzip-dev \
    && docker-php-ext-configure gd --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd zip

# NOTE: see https://github.com/docker-library/php/issues/240#issuecomment-305038173
RUN apk add --no-cache --repository http://dl-3.alpinelinux.org/alpine/edge/testing gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

# NOTE: for suppress composer warning
ENV COMPOSER_ALLOW_SUPERUSER = 1

WORKDIR /workspace
COPY ./ .
RUN make setup
RUN chown -R nginx:nginx *

ENTRYPOINT ["./docker_files/entry_point.sh"]
