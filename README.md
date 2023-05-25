# house

Test

## Установка

1. Clone this repo by running `git clone git@github.com:gordi256/house.git` on your CLI.
2. Setup your virtual host. sudo nano /etc/php/8.1/cli/php.ini включить extention ext-dom ext-intl gd!

3. Выполнить команду composer install в корневом каталоге
4. cp .env.example .env
5. php artisan key:generate
6. npm установился после apt install ,
7.  curl -fsSL https://deb.nodesource.com/setup_20.x | bash - &&\ apt-get install -y nodejs
8.  Выполнить команды   npm i , npm run build в корневом каталоге

9. Настроить соединение с базой данных и почтовым сервером (для отправки уведомлений пользователям) в файле .env и выполнить php artisan migrate, php artisan db::seed

10. выполнить php artisan op:c
11. sudo chown -R www-data.www-data /var/www/house/bootstrap/cache
12. sudo chown -R www-data.www-data /var/www/house/storage
13. sudo chown -R www-data.www-data /var/www/house/public/media

## ДЕМО ПОЛЬЗОВАТЕЛИ

Админ
email: `admin@admin.com`
password: `password`

Пользователи (10 штук)

user1 - user10@admin.com

email: `user1@admin.com` -
password: `password`
