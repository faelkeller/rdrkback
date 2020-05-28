#!/bin/bash

echo Copying the configuration example file
cp .env.example .env

echo Install dependencies
composer install

echo Generate key
php artisan key:generate

echo Cache Config
php artisan config:cache

echo Cache Clear
php artisan cache:clear

echo Make migrations
php artisan migrate -v

echo Make seeds
php artisan db:seed
