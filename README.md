# steps to run this repo locally

`` composer install `` <br>
use this command to install the packages
***

`` cp .env.example .env ``<br>
use this command to create a copy of the .env.exmaple file
***
`` php artisan key:generate ``<br>
use this command to generate an app key
***
## configure the .env file
* DB_CONNECTION= sql database you are using
* DB_HOST= hostname
* DB_PORT= the port
* DB_DATABASE= database name
* DB_USERNAME= the username of the database
* DB_PASSWORD= password of the database
***
`` php artisan migrate ``<br>
run this command to create the tables
***
`` php artisan serve ``<br>
run this command to start the server, and your good to go




