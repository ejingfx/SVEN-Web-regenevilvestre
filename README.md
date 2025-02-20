# SVEN-Web-regenevilvestre
Clone the repository

# API
## Pre-requisite
- Docker

## Get Started
1. In the backend folder
```
cp .env.example .env
```
2. Paste this values below into the .env configuration
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=api_test
DB_USERNAME=dbuser
DB_PASSWORD=password
```
3. Run docker compose up -d
4. Inside the running docker container, execute command
```
docker compose exec php bash
```
5. While inside the container, execute and install dependencies
```
composer install
```
6. Generate Laravel app key
```
php artisan key:generate
```
7. Generate migrations
```
php artisan key:generate
```
8. Generate swagger
```
php artisan l5-swagger:generate
```

# FRONTEND
## Pre-requisite
- npm or yarn installed on your machine

## Get Started
1. In the frontend folder
```
cp env-sample .env
```
2. Run and install dependencies
```
yarn install
```
3. Serve
```
yarn serve
```
