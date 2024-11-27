FROM php:8.2-apache

# Instala extensiones de PHP necesarias (opcional)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia tu aplicación PHP al contenedor
COPY ./ /var/www/html

# Configura permisos (opcional)
RUN chown -R www-data:www-data /var/www/html
