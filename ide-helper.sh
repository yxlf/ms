#!/bin/bash

php artisan ide-helper:generate
php artisan ide-helper:meta
php artisan ide-helper:models -R
php artisan ide-helper:eloquent
