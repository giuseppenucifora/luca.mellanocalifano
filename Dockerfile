FROM webdevops/php-nginx-dev:7.4

# TimeZone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Rome /etc/localtime && echo Europe/Rome > /etc/timezone

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Set the working directory
WORKDIR /app

COPY / /app

RUN mkdir -p /app/var

RUN chmod 777 -R /app/var