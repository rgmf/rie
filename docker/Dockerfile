FROM webdevops/php-nginx:8.2-alpine

# RUN apk add oniguruma-dev postgresql-dev libxml2-dev
RUN apk add oniguruma-dev libxml2-dev curl imagemagick nodejs npm zlib-dev libzip-dev
# RUN docker-php-ext-install mysqli mbstring gd curl

# Copy Composer binary from the Composer official Docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV WEB_DOCUMENT_ROOT /app/public
ENV APP_ENV production
WORKDIR /app
COPY . .

RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN composer require laravel/ui:*
RUN php artisan ui bootstrap
RUN npm install
RUN npm run build
RUN php artisan key:generate
# Optimizing Configuration loading
RUN php artisan config:cache
# Optimizing Route loading
RUN php artisan route:cache
# Optimizing View loading
RUN php artisan view:cache

RUN chown -R application:application .
