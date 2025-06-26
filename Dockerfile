# 1) Imagem base: PHP-FPM + Alpine + Node.js/npm
FROM php:8.2-fpm-alpine3.18

# 2) Atualiza SO, instala libs do PHP, Composer, Node.js e npm
RUN apk update \
    && apk upgrade --no-cache \
    && apk add --no-cache \
    oniguruma-dev libzip-dev libpng-dev zip unzip ca-certificates \
    curl nodejs npm \
    && update-ca-certificates \
    && rm -rf /var/cache/apk/*

# 3) Instala extensões PHP necessárias
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# 4) Copia o binário do Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 5) Define o diretório de trabalho
WORKDIR /var/www/html

# 6) Copia apenas os manifests para instalar dependências
COPY composer.json composer.lock package.json package-lock.json ./

# 7) Instala dependências PHP (sem rodar scripts) e deps JS
RUN composer install --no-dev --optimize-autoloader --no-scripts \
    && npm ci

# 8) Copia todo o código da aplicação (inclui artisan, migrations, etc.)
COPY . .
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# 10) Dispara os scripts que requerem artisan e gera assets finais
RUN php artisan package:discover --ansi \
    && npm run build

# 11) Expõe porta do PHP-FPM e inicia
EXPOSE 9000
CMD ["php-fpm"]
