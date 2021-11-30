FROM php:8.1.0-fpm-alpine3.14
LABEL maintainer="dev@shigeki.tokyo"

COPY ./docker/development/php/php.ini /usr/local/etc/php/
COPY ./docker/development/php/opcache.ini /usr/local/etc/php/conf.d/

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_NO_INTERACTION 1
ENV COMPOSER_MEMORY_LIMIT -1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apk upgrade --update \
  && apk --no-cache add --virtual .build-dependencies \
  g++ \
  gcc \
  make \
  autoconf \
  wget \
  unzip \
  git \
  tzdata \
  oniguruma-dev \
  postgresql-dev \
  && apk --no-cache add \
  postgresql-client \
  libzip-dev \
  icu-dev \
  libpng-dev \
  libjpeg-turbo-dev \
  libwebp-dev \
  freetype-dev \
  exiftool \
  && pecl install apcu xdebug \
  && docker-php-ext-enable apcu xdebug \
  && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
  && docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install -j$(nproc) \
  bcmath \
  gd \
  opcache \
  pgsql \
  pdo_pgsql \
  zip \
  intl \
  opcache \
  exif \
  && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
  && apk del .build-dependencies \
  && rm -rf /usr/lib/mysqld* \
  && rm -rf /usr/bin/mysql* \
  && rm -rf /var/cache/apk/*

WORKDIR /var/www