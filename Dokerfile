# Base image for PHP with Apache
FROM php:8.1-apache

# Set working directory inside the container
WORKDIR /var/www/html

# Install necessary PHP extensions and utilities
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql

# Enable Apache mod_rewrite and headers for caching
RUN a2enmod rewrite headers

# Clone your GitHub repository (replace with your repo URL)
RUN git clone https://github.com/Ashirafali/cake_ordering_system.git .

# Copy project files into container
COPY . .

# Set permissions for Apache
RUN chown -R www-data:www-data /var/www/html

# Install composer (for managing PHP dependencies)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies if composer.json exists
RUN if [ -f composer.json ]; then composer install; fi

# Set up Apache caching headers for static files
RUN echo '<FilesMatch "\.(html|css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot)$">\n\
    Header set Cache-Control "max-age=2592000, public"\n\
</FilesMatch>' > /etc/apache2/conf-available/cache-control.conf && \
    a2enconf cache-control

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
