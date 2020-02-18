#!/bin/bash

echo Uploading Application container
docker-compose up -d

echo Copying the configuration example file
docker exec -it rdrkback-app cp .env.example .env

echo Install dependencies
docker exec -it rdrkback-app composer install

echo Generate key
docker exec -it rdrkback-app php artisan key:generate

echo Cache Config
docker exec -it rdrkback-app php artisan config:cache

echo Cache Clear
docker exec -it rdrkback-app php artisan cache:clear

echo Make migrations
docker container exec -it rdrkback-app php artisan migrate -v

echo Make seeds
docker exec -it rdrkback-app php artisan db:seed

echo Information of new containers
docker ps -a
