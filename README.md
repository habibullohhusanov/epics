<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## USE

install [xampp](https://www.apachefriends.org/ru/index.html).
install [composer](https://getcomposer.org/Composer-Setup.exe).
Create a base named "epics".

**Need to change**
  * .env.example will be changed to .env
  * Write the Bearer token obtained from [getimg.ai](https://getimg.ai/) to "API_TOKEN".
___
### Enter the following in the terminal
```
composer install
```
```
php artisan key:generate
```
```
php artisan migrate
```
```
php artisan db:seed
```
```
php artisan storage:link
```
#### Open new terminal
```
php artisan artisan serve
```
#### Open new terminal
```
php artisan schedule:work
```
#### Open new terminal
```
php artisan queue:work
```


## About [Epics.uz]("https://epics.uz")
_Through this site you can change text to image._