FROM php:7.4-cli
COPY /src /usr/src/comments-sdk
WORKDIR /usr/src/comments-sdk
RUN composer install