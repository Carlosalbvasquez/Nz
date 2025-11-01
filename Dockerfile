FROM php:8.2-apache

# Copia el código fuente al contenedor
COPY ./public /var/www/html/public
COPY ./backend /var/www/html/backend

# Cambia el DocumentRoot de Apache a /var/www/html/public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Da permisos adecuados (opcional, según tu necesidad)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expone el puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
