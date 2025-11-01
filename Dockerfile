FROM php:8.2-apache

# Instala dependencias comunes para PHP (MySQL, ZIP, etc.)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

# Copia TODO el código a /var/www/html/
COPY . /var/www/html/

# Suprime advertencia de ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Configura DirectoryIndex para incluir index.php y index.html
RUN echo "DirectoryIndex index.php index.html" >> /etc/apache2/apache2.conf

# Da permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expone puerto 80 (Render lo detecta automáticamente)
EXPOSE 80

# Inicia Apache
CMD ["apache2-foreground"]
