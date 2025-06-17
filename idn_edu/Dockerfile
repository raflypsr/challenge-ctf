FROM php:8.2-apache

COPY . /var/www/html/
RUN chmod -R 755 /var/www/html

RUN a2enmod rewrite

# ⬇️ Ini bagian penting untuk AllowOverride
RUN echo "<Directory /var/www/html>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" > /etc/apache2/conf-available/allow-override.conf && \
    a2enconf allow-override

EXPOSE 80

CMD ["apache2-foreground"]

