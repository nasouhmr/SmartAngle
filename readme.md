Project Info:

Laravel:5.7

PHP:7.2^

Admin panel : https://laravel-admin.org/
OAuth2 Laravel Passport  
Design pattern : Repository pattern

1.clone project

2.cd project directoy

3.composer update

4.change db connection in .env as you like

    example:
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=smartangle
    DB_USERNAME=root
    DB_PASSWORD=

5.Then run these commands to publish assets and config：

    php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"

6.At last run following commands to finish install. 

    php artisan migrate
    php artisan admin:install 
    php artisan make:auth
    php artisan passport:install

7.php artisan serve 

8.Open http://127.0.0.1:8000/admin/auth/login in browser 

    username :admin
    password: admin

 