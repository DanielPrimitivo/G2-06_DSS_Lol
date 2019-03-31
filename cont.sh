#!/bin/bash


cp .env.example .env
touch database/database.sqlite
php artisan migrate:refresh --seed
php artisan key:generate
