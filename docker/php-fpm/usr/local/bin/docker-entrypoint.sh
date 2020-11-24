#!/usr/bin/env bash

find /var/www/html -type d -name "*storage" -exec chmod -R 777 {} +

exec docker-php-entrypoint "$@"
