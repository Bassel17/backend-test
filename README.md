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
`` php artisan jwt:secret ``<br>
use this command to generate secret jwt key in your .env file
***
## configure the .env file
* DB_CONNECTION= sql database you are using
* DB_HOST= hostname
* DB_PORT= the port
* DB_DATABASE= database name
* DB_USERNAME= the username of the database
* DB_PASSWORD= password of the database
* JWT_TTL= time in minutes for the duration of the jwt token by default it is (60)
***
`` php artisan migrate --seed``<br>
run this command to create the tables and seed them with fake data
***
`` php artisan serve ``<br>
run this command to start the server, and you're good to go




