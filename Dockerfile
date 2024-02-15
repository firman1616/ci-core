# Set base image
FROM php:7.4-apache

# Enable Apache modules
RUN a2enmod rewrite

# Install dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install -j$(nproc) iconv gd mysqli zip pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy CodeIgniter files to the container
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 ./

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
