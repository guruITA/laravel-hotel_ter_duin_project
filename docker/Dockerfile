FROM php:8.1-cli

RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip libzip-dev \
    && docker-php-ext-install pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# room photos can be bigger than the PHP default of 2 MB
RUN printf "upload_max_filesize=20M\npost_max_size=25M\n" > /usr/local/etc/php/conf.d/uploads.ini

# run as a normal user so files written to the project folder stay yours on Linux
ARG UID=1000
RUN useradd --create-home --uid ${UID} app
USER app

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html
EXPOSE 8000
ENTRYPOINT ["sh", "/usr/local/bin/entrypoint.sh"]
