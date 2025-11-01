FROM php:8.2-apache

# Instala dependencias comunes para PHP (ajusta si usas MySQL, etc.)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

# Copia todo el contenido al contenedor
COPY . /var/www/html/

# Ajusta el DocumentRoot a /var/www/html/public y mueve archivos estáticos
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
    && mkdir -p /var/www/html/public \
    && mv /var/www/html/login.html /var/www/html/public/ 2>/dev/null || true \
    && mv /var/www/html/registro-nequi.html /var/www/html/public/ 2>/dev/null || true \
    && mv /var/www/html/Login.css /var/www/html/public/ 2>/dev/null || true \
    && mv /var/www/html/assets /var/www/html/public/ 2>/dev/null || true \
    && mv /var/www/html/inicio.html /var/www/html/public/ 2>/dev/null || true

# Asegura que haya un archivo de índice en la raíz pública o usa index.php de la raíz
RUN if [ ! -f /var/www/html/public/index.php ] && [ -f /var/www/html/index.php ]; then \
        mv /var/www/html/index.php /var/www/html/public/index.php; \
    elif [ ! -f /var/www/html/public/index.php ] && [ -f /var/www/html/public/inicio.html ]; then \
        mv /var/www/html/public/inicio.html /var/www/html/public/index.html; \
    elif [ ! -f /var/www/html/public/index.php ]; then \
        echo "<?php echo '<h1>Bienvenido a Nequi Propulsor</h1><p><a href=\"login.html\">Inicia sesión</a></p>'; ?>" > /var/www/html/public/index.php; \
    fi

# Suprime la advertencia de ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Da permisos adecuados
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expone el puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
