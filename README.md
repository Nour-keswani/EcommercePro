# EcommercePro
To start a Laravel project after cloning, there are several steps you need to follow. 
Here are the steps compiled from the search results:

#1- Clone your Laravel project from git and put it into your local server.
#2- Go to the folder of the application using the command line interface (CLI) or terminal.
#3- Run composer install on your CLI or terminal to install dependencies. You can also use the shortcut composer i.
#4- Copy the .env.example file to .env on the root folder of your project. You can use the command cp .env.example .env if using a terminal on Ubuntu, 
or copy .env.example .env if using the command prompt on Windows.
#5- Generate an application key by running the command php artisan key:generate on your CLI or terminal. This will create an application key in the .env file.
#6- Create an empty database for your project using the database tools you prefer. You can use SequelPro for Mac or any other database tool you are comfortable with.
#7- Inside the MySQL container shell, create the database by running the command mysql --password= --execute="create database yourDatabaseName" && exit. 
Replace yourDatabaseName with the name you want to give your database.
#8- Start the docker container by running the command vendor/bin/sail up on your CLI or terminal. This will start the Laravel project on your local server.
# Following these steps will allow you to start a Laravel project after cloning.
