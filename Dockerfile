FROM php:7.1-cli

# Environmental Variables
ENV COMPOSER_HOME /root/composer
ENV COMPOSER_VERSION master

RUN set -xe \
    && docker-php-ext-install \
        zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer global require hirak/prestissimo

COPY . /usr/src/myapp
WORKDIR /usr/scr/myapp

EXPOSE 8000

ENTRYPOINT ["php", "-S 127.0.0.1:8000"]
