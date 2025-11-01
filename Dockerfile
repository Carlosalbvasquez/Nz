FROM php:8.2-apache

# Instala dependencias comunes para PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

# Copia todo el contenido de la raíz al contenedor
COPY . /var/www/html/

# No cambia el DocumentRoot (usa el predeterminado /var/www/html)
# Opcional: Si quieres un subdirectorio público, descomenta y ajusta
# RUN mkdir -p /var/www/html/public && mv /var/www/html/login.html /var/www/html/public/

# Da permisos adecuados
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expone el puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
