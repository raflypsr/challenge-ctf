FROM php:8.1-apache

# Salin semua file ke dalam /var/www/html
COPY . /var/www/html

# Pindah ke direktori kerja
WORKDIR /var/www/html

# Aktifkan mod_rewrite
RUN a2enmod rewrite

# Konfigurasi AllowOverride supaya .htaccess aktif
RUN echo "<Directory /var/www/html>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" > /etc/apache2/conf-available/allow-override.conf && \
    a2enconf allow-override

# Expose port 80
EXPOSE 80

# Jalankan apache2
CMD ["apache2-foreground"]

