Project Info:
Laravel:5.7
Admin panel : https://laravel-admin.org/


1.clone project

2.cd project directoy

3.composer update

5.change db connection in .env as you like
-----------
    example:
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=smartangle
    DB_USERNAME=root
    DB_PASSWORD=

4.Then run these commands to publish assets and config：

    php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"

5.At last run following command to finish install. 

    php artisan admin:install 

6.php artisan serve 

7.Open http://127.0.0.1:8000/admin/auth/login in browser 

    username :admin
    password: admin

 