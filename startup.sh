#!/bin/bash

## Optimize the Laravel app
#echo "Optimizing the Laravel app..."
#php artisan optimize
#
#echo "Migrating new tables..."
#php artisan migrate --force
#
## access storage folder
chmod -R 777 ./storage

## Format child-parent permissions & save in cache
#echo "Formating child-parent permissions"
#php artisan permissions:config
#
#echo "Restarting Laravel Queue Worker and Clear Horizon..."
#php artisan queue:restart
#
#sleep 5
#
## Start Laravel Queue Worker
#echo "Starting Laravel Queue Worker with Supervisor..."
#supervisord -c /etc/supervisor/supervisord.conf
#
#sleep 2
#supervisorctl restart all
#
#sleep 2
#cron
#echo "Cron service started."

# Final step, start the Apache server
echo "Starting Apache server..."
apache2-foreground
