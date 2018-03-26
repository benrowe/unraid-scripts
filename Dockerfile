FROM php:7.1-cli
COPY . /usr/src/myapp
WORKDIR /usr/scr/myapp

EXPOSE 8000

ENTRYPOINT ["php", "-S 127.0.0.1:8000"]
