# Base image pakai PHP + Apache
FROM php:8.2-apache

# Copy semua file ke folder html Apache
COPY . /var/www/html/

# Atur permission (opsional, tapi biasanya biar aman)
RUN chown -R www-data:www-data /var/www/html

# Enable Apache mod_rewrite kalau perlu (optional)
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache service
CMD ["apache2-foreground"]

