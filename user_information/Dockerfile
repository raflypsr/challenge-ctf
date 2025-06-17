FROM php:8.1-apache
COPY . /var/www/html
WORKDIR /var/www/html
RUN a2enmod rewrite
EXPOSE 80
CMD php -S 0.0.0.0:80
