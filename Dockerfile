FROM php:8.1-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js and npm
RUN apt-get update && apt-get install -y \
    curl \
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean

ARG uid
RUN useradd -G www-data,root -u $uid -d /home/devuser devuser
RUN mkdir -p /home/devuser/.composer && \
    chown -R devuser:devuser /home/devuser

# Enable Apache modules
RUN a2enmod rewrite proxy proxy_http

# Copy application source
COPY . /var/www/html/

# Set permissions for the application source
RUN chown -R devuser:devuser /var/www/html && \
    chmod -R 755 /var/www/html

# Change Apache to run as devuser
RUN sed -i 's/www-data/devuser/g' /etc/apache2/envvars

# Set working directory
WORKDIR /var/www/html/

# Run Composer install if composer.json is present
RUN if [ -f composer.json ]; then composer install; fi

# Copy the Apache configuration file
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Argument for PHP_PORT
ARG PHP_PORT=80

# Dynamically expose the port based on the argument
EXPOSE ${PHP_PORT}

# Set environment variable PHP_PORT to be used in the container
ENV PHP_PORT=${PHP_PORT}

