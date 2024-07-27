FROM php:8.1-apache

WORKDIR /var/www/html/

# Копируем содержимое текущего каталога в /var/www/html/
COPY . .

# Установите права доступа для папки
RUN chown -R www-data:www-data /var/www/html

# Настройте файл конфигурации Apache
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf

# Устанавливаем расширение PDO для работы с MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Включаем mod_rewrite
RUN a2enmod rewrite
RUN service apache2 restart
