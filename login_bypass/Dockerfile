FROM php:8.2-apache

# Install SQLite (opsional, kalau perlu database)
RUN apt-get update && apt-get install -y \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Copy semua file project ke /var/www/html
COPY . /var/www/html/

# Izinkan .htaccess dipakai (AllowOverride All)
RUN echo "<Directory /var/www/html>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" > /etc/apache2/conf-available/allow-override.conf && \
    a2enconf allow-override

# Aktifkan module rewrite di Apache
RUN a2enmod rewrite

# Pastikan permission file kamu benar
RUN chmod -R 755 /var/www/html

# Buka port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

