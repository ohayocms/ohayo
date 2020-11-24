### PHP
FROM php:7.4.2-fpm

# libicu-dev - for intl
RUN apt-get update \
    && apt-get install -y --no-install-recommends libicu-dev libz-dev zlib1g-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl mysqli pdo pdo_mysql mbstring \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* || true

COPY ./docker/php-fpm/usr /usr
COPY ./src /var/www/html

WORKDIR /var/www/html

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["php-fpm"]
