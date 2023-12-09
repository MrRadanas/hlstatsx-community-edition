FROM php:8.2-fpm-alpine

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

RUN apk update \
    apk upgrade \
#    && apk add --no-cache \
#        git \
#        zip \
#        wget \
#        curl \
#        libzip-dev \
#        gmp-dev \
#        libffi-dev \
#        icu-dev \
#        icu-data-full \
#        libpq-dev \
#        rabbitmq-c-dev \
#        gnupg \
    ; \
    rm -rf /var/cache/apk/*; \
    rm -rf /tmp/*;

## Install php extensions
RUN set -eux; \
    install-php-extensions \
#        sockets \
#        zip \
#        gmp \
#        pcntl \
#        bcmath \
#        ffi \
#        intl \
        opcache \
        pdo \
        pdo_pgsql \
        pdo_mysql \
        pgsql \
#        redis \
#        amqp \
    ;


WORKDIR /var/www/hlstats_web