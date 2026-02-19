# 1. Usamos a imagem oficial do PHP com Apache
FROM php:8.2-apache

# 2. Instalação de dependências do sistema e extensões PHP necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Ativa o módulo de reescrita (rewrite) do Apache para o Laravel lidar com as rotas
RUN a2enmod rewrite

# 4. Configura o diretório raiz do Apache para a pasta /public do Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Instala o Composer (Gerenciador de dependências do PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Copia todos os arquivos do seu projeto para dentro do container
COPY . /var/www/html

# 7. Instala as dependências do Laravel via Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# 8. Define as permissões corretas para as pastas de cache e storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Porta padrão que a Render e o Docker vão usar
EXPOSE 80

# 10. Comando para iniciar o servidor
CMD ["apache2-foreground"]