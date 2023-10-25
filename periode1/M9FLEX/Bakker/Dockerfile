FROM php:7.4-apache

# Activeer Apache-mod_rewrite
RUN a2enmod rewrite

# Installeer PHP-extensies
RUN docker-php-ext-install mysqli

# Kopieer broncode naar de container
COPY ./public /var/www/html

# Expose poort 80
EXPOSE 80

# Start Apache-server
CMD ["apache2-foreground"]
