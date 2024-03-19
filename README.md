
##Git New file Upload-----

-git init
-git add .
-git commit -m "First Comment"
-git branch -M main
-git remote add origin .... URL ...
-git push origin main --force

##Git New file Download -----
-git init
-git clone ---URL---
-composer install
-php artisan key:generate
-php artisan migrate

##Git Update file Download -----
-git add .
-git status
-git commit -m "My comment" 
-git push origin master



## About Prime University Application

This laravel application are Developed php and laravel version 8. To install this application 
please follow those instructions.
- **Create a database locally named ...... **
- **Download composer https://getcomposer.org/download/**
- **Pull Laravel/php project from git provider.**
- **Rename .env.example file to .envinside your project root and fill the database information. (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )**
- **Open the console and cd your project root directory**
- **Run composer install or php composer.phar install**
- **Run php artisan key:generate**
- **Run php artisan migrate**
- **Run php artisan db:seed --class=CreateUsersSeeder**
