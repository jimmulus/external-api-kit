## External API 

Work In Progress

Consuming external APIs implementation for easy maintenance and interchangability. At this moment just playing around with the concept and https://dummyjson.com/

## Installation and setup ## 
- Open folder in your terminal
- Run command in terminal to install packages from composer.json\
`composer install`
- Copy the .env.example file and rename it to .env
- setup url\
`APP_URL`
- Setup  database connection in your .env file\
`DB_DATABASE`\
`DB_USERNAME`\
`DB_PASSWORD`\
`DATA_API_PROVIDER`
- Run command in terminal to generate an APP_KEY\
`php artisan key:generate`
- Run command in terminal to migrate database\
`php artisan migrate`
- Run command in terminal to start server (or setup your own webserver)\
`php artisan serve`

## .env ##
DATA_API_PROVIDER
options: testing, dummy

## config file ##
external-apis.php

## Controler ##
- `DummyController.php` 

## Services ## 
- `Services\Api\DataApi.php` : interface DataApi
- `Services\Api\Dummy` : classes implementing the DataApi interface 
- `Services\Api\Dummy\DTO` : data transfer objects

## api route to get data with optional get parameters (running php artisan serve) 
http://127.0.0.1:8000/api/dummy

get parameters options: search, limit and skip only work when DATA_API_PROVIDER is set to dummy

