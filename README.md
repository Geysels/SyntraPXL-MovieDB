<p align="center"><a href="https://geysels.com" target="_blank"><img src="https://geysels.com/assets/both_w.png" width="400"></a></p>

# Instalation

## Clone the repository
```
git clone https://github.com/Geysels/SyntraPXL-MovieDB.git
```
## Get an api  key from 
```
https://www.omdbapi.com/apikey.aspx
```
## Rename '.env.example' to '.env' and change database credentials and API key
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1 [database host]
DB_PORT=3306
DB_DATABASE= [database name]
DB_USERNAME= [username]
DB_PASSWORD= [password]
API_KEY=[key from previous step]
```
## Install composer dependencies
```
composer install 
```

## Run migrations 
```
php artisan migrate:fresh
```

## Serve the project
```
php artisan serve
```
