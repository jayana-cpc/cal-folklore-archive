FROM php:8.3.30-apache

# Install system deps
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        libzip-dev libpng-dev libonig-dev libxml2-dev \
        libfreetype6-dev libjpeg62-turbo-dev libwebp-dev libicu-dev \
        default-mysql-client git unzip curl libcap2-bin && \
    docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
    rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install -j$(nproc) mysqli pdo_mysql mbstring zip gd xml intl opcache

# Apache modules
RUN a2enmod rewrite headers

# PHP ini tweaks
RUN { \
    echo "upload_max_filesize=32M"; \
    echo "post_max_size=32M"; \
    echo "memory_limit=256M"; \
  } > /usr/local/etc/php/conf.d/uploads.ini

# Opcache settings (balanced for dev-friendly defaults)
RUN { \
    echo "opcache.enable=1"; \
    echo "opcache.enable_cli=1"; \
    echo "opcache.memory_consumption=128"; \
    echo "opcache.interned_strings_buffer=16"; \
    echo "opcache.max_accelerated_files=10000"; \
    echo "opcache.revalidate_freq=0"; \
    echo "opcache.validate_timestamps=1"; \
  } > /usr/local/etc/php/conf.d/opcache-recommended.ini

WORKDIR /var/www/html

# Copy app
COPY . /var/www/html

# Allow Apache to bind privileged port as non-root
RUN setcap 'cap_net_bind_service=+ep' /usr/sbin/apache2

# Drop to non-root user
RUN chown -R www-data:www-data /var/www/html
USER www-data

# Default dev login; override via env/.env
ENV DEV_LOGIN=1

# Expose port
EXPOSE 80
