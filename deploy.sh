eval "$(ssh-agent -s)"
ssh-add -k ~/.ssh/id_rsa_servers
git pull

sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl restart servers-worker:*

composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache