FROM php:7.3.10-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends vim curl debconf subversion git apt-transport-https apt-utils \
    build-essential locales acl mailutils wget zip unzip zlib1g-dev libzip-dev \
    gnupg gnupg1 gnupg2 libicu-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    nodejs npm

RUN docker-php-ext-configure zip --with-libzip
RUN docker-php-ext-install pdo pdo_mysql zip

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

RUN pecl install pcov && docker-php-ext-enable pcov

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd

COPY php.ini /usr/local/etc/php/php.ini
COPY php-fpm-pool.conf /etc/php/7.3.10/pool.d/www.conf

# Composer

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

# Vue.js
RUN npm install -g yarn

WORKDIR /var/www/

EXPOSE 9000
CMD ["php-fpm"]
