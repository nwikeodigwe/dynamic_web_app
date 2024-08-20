FROM php:8.0-apache

WORKDIR /var/www/html

COPY . .

COPY apache.conf /etc/apache2/conf-available/servername.conf

RUN a2enconf servername

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN chown -R www-data:www-data /var/www/html
RUN find /var/www/html -type d -exec chmod 755 {} \;
RUN find /var/www/html -type f -exec chmod 644 {} \;

RUN a2enmod rewrite

RUN apt-get update && apt-get upgrade -y

EXPOSE 80

CMD ["apache2-foreground"]
