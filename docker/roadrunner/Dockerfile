FROM php:7.3-cli

WORKDIR /app

RUN apt-get update && apt-get install -y unzip libzip-dev

#Install needed extensions and composer
RUN docker-php-ext-install zip && docker-php-ext-install opcache && docker-php-ext-enable opcache \
  && pecl install -o -f redis &&  rm -rf /tmp/pear &&  docker-php-ext-enable redis \
  && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php \
  && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer \
  && composer global require hirak/prestissimo

COPY ./ /app/

RUN cp .env.example .env && composer install --optimize-autoloader --no-dev --no-interaction && ./vendor/bin/rr get && mv ./rr /usr/local/bin/rr \
  && php artisan route:cache && php artisan view:cache && php artisan config:cache

ENTRYPOINT ["rr", "serve", "-d", "-v"]