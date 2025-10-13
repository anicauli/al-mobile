FROM php:8.4-apache

RUN echo "memory_limit=-1" > /usr/local/etc/php/conf.d/memory-limit.ini

RUN apt-get update -y && \
    apt-get install -y \
        libpq-dev \
        libpng-dev \
        unzip \
        libzip-dev \
        supervisor \
        ffmpeg \
        cron && \
    docker-php-ext-install pdo pdo_mysql gd && \
    pecl install redis && docker-php-ext-enable redis

RUN docker-php-ext-install zip
RUN docker-php-ext-install pcntl
RUN docker-php-ext-configure pcntl --enable-pcntl

WORKDIR /var/www/html

#Install Composer
RUN apt-get update && apt-get -y install unzip --no-install-recommends && \
    curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php && \
    HASH=`curl -sS https://composer.github.io/installer.sig` && \
    php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
#COPY laravel-queue.conf /etc/supervisor/conf.d/supervisord.conf
#
#COPY laravel-cron /etc/cron.d/laravel-cron
#RUN chmod 0644 /etc/cron.d/laravel-cron
#RUN crontab /etc/cron.d/laravel-cron

RUN a2enmod rewrite macro

COPY . .

#RUN composer install --no-dev --optimize-autoloader

#RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN chmod -R 1777 /tmp

RUN chmod +x startup.sh

CMD ["./startup.sh"]
