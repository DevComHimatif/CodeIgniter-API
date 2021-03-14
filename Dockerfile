FROM php:7.4-apache

RUN apt-get update
RUN apt-get upgrade -y

# install dependencies
RUN apt-get install --no-install-recommends -y \
    libpq-dev libxml2-dev libbz2-dev zlib1g-dev curl libonig-dev zip unzip

RUN docker-php-ext-install intl mbstring pdo pgsql pdo_pgsql
RUN docker-php-ext-enable intl mbstring pdo pgsql pdo_pgsql

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer self-update --2

# config apache
ADD config/apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# change work directory
WORKDIR /var/www/html

# copy source code
COPY . .
RUN composer install

# fix permission to writable directory
RUN chmod -R 0777 /var/www/html/writable

# cleanup
RUN apt-get clean \
  && rm -r /var/lib/apt/lists/*

# expose internal apache port
EXPOSE 80

# run apache daemon
CMD ["bash", "/usr/sbin/apache2ctl", "-D", "FOREGROUND"]