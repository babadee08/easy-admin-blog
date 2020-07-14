FROM php:7.4-fpm

RUN apt-get update && apt-get install -y

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
&& docker-php-ext-install \
    zip \
    intl \
    mysqli \
    pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
COPY ./ /var/www/html
WORKDIR /var/www/html/

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]


#FROM php:7.4-fpm
#
#RUN apt-get update && apt-get install -y \
#    build-essential \
#    git \
#    zlib1g-dev \
#    libxml2-dev \
#    libmcrypt-dev \
#    libpq-dev \
#    libpng-dev \
#    libjpeg62-turbo-dev \
#    libfreetype6-dev \
#    libzip-dev \
#    locales \
#    zip \
#    intl \
#    unzip \
#    nano
#
## Clear cache
#RUN apt-get clean && rm -rf /var/lib/apt/lists/*
#
## Installing extensions
#RUN docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl bcmath opcache
#
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#
#RUN pecl install xdebug && docker-php-ext-enable xdebug
#
#RUN echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#    echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#    echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#    echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini;
#
#WORKDIR /var/www/html
#
#ADD ./ /var/www/html