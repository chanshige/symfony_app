FROM nginxinc/nginx-unprivileged:latest
LABEL maintainer="dev@shigeki.tokyo"

COPY ./docker/development/nginx/nginx.conf /etc/nginx/
COPY ./docker/development/nginx/default.conf /etc/nginx/conf.d/

EXPOSE 8080