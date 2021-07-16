git fetch --all
git reset --hard origin/master
composer dump-autoload
composer install
composer install --optimize-autoloader --no-dev

cd /
sudo chown -R :www-data var/www/u25
sudo chmod -R 775 var/www/u25/storage
sudo chmod -R 775 var/www/u25/bootstrap/cache
sudo chmod +x var/www/u25/deploy.sh
sudo chown -R www-data:www-data /var/www/u25/public

cd var/www/u25

cp .env.prod .env

php artisan optimize:clear
php artisan migrate
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache