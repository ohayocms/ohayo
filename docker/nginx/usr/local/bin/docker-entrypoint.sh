#!/usr/bin/env bash

export DOMAIN=${DOMAIN:-'localhost'}
export BACKEND_ADDRESS=${BACKEND_ADDRESS:-'localhost'}

test -f /etc/nginx/conf.d/default.conf && rm -f /etc/nginx/conf.d/default.conf
envsubst "\${DOMAIN} \${BACKEND_ADDRESS}" < /etc/nginx/conf.d/main.conf.template > /etc/nginx/conf.d/default.conf

exec nginx -g 'daemon off;'
