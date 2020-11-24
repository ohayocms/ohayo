FROM nginx:1.17.1

COPY ./docker/nginx/etc /etc
COPY ./docker/nginx/usr /usr
COPY ./src /var/www/html

WORKDIR /var/www/html

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
