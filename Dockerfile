FROM node:18.20-alpine3.20 as frontend

# Install git incase our npm dependencies require git
RUN apk update && apk upgrade && apk add --no-cache git

#RUN mkdir -p /app/public/build
WORKDIR /app

COPY . .

RUN npm install --force
RUN npm run build


FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    		libfreetype6-dev \
    		libpng-dev \
    		libwebp-dev \
    		libjpeg62-turbo-dev \
    		libmcrypt-dev \
    		libzip-dev \
            zip \
    		git \
    		mariadb-client \
            python3 \
    && docker-php-ext-install \
    pdo_mysql \
    gd \
    zip
    #&& a2enmod \
    #rewrite

# Add the user UID:1000, GID:1000, home at /app
RUN groupadd -r app -g 1000 && useradd -u 1000 -r -g app -m -d /app -s /sbin/nologin -c "App user" app && \
    chmod 777 /var/www/html

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer


#RUN composer update
#upload
RUN echo "file_uploads = On\n" \
         "memory_limit = 500M\n" \
         "upload_max_filesize = 500M\n" \
         "post_max_size = 500M\n" \
         "max_execution_time = 600\n" \
         > /usr/local/etc/php/conf.d/uploads.ini

USER app

#copy source code
WORKDIR /var/www/html

COPY . .

COPY default.conf /etc/apache2/sites-enabled/000-default.conf

USER root

RUN mkdir -p /var/www/html/storage
RUN chmod -R 777 /var/www/html/storage

RUN alias composer='php /usr/bin/composer'
RUN composer update
RUN composer install --optimize-autoloader --no-dev

RUN mkdir -p /var/www/html/public/build/assets
COPY --from=frontend /app/public/build/* /var/www/html/public/build/
COPY --from=frontend /app/public/build/assets/* /var/www/html/public/build/assets/

CMD ls -la /var/www/html/public/assets/

RUN a2enmod rewrite
RUN a2enmod headers
#RUN a2enmod ssl

#COPY default_ssl.conf /etc/apache2/sites-enabled/default-ssl.conf
#COPY mycert.crt /etc/apache2/ssl/ssl.crt
#COPY mycert.key /etc/apache2/ssl/ssl.key

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80
#443
