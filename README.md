# house
Test 

## Установка


1. Clone this repo by running `git clone git@github.com:gordi256/house.git` on your CLI.
2. Setup your virtual host.  /etc/php/8.1/cli/php.ini включить extention ext-dom ext-intl  gd!

3. Выполнить команду composer install в корневом каталоге
4. cp .env.example .env
5. php artisan key:generate

6. Настроить соединение с базой данных в файле .env и выполнить  php artisan migrate,  php artisan db::seed

7. выполнить php artisan op:c 
8. sudo chown -R www-data.www-data /var/www/house/bootstrap/cache
9. sudo chown -R www-data.www-data /var/www/house/storage

## ДЕМО ПОЛЬЗОВАТЕЛИ

Админ
email: `admin@admin.com`
password: `password`

Пользователи 

user1 - user10@admin.com

email: `user1@admin.com`  - 
password: `password`
