# Inspektorat Gresik Filament CMS

## Local Environment

Instruction using Laravel Sail Docker

### 1. Clone the project

```bash
git clone https://github.com/av1st78/inspektorat-gresik.git
```

### 2. Run `composer install`

Navigate into project folder using terminal and run

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

### 3. Copy `.env.example` into `.env`

```bash
cp .env.example .env
```

### 4. Start the project in detached mode

```bash
./vendor/bin/sail up -d
```
From now on whenever you want to run artisan command you should do this from the container. <br>
Access to the docker container
```bash
./vendor/bin/sail bash
```

### 5. Set encryption key

```bash
php artisan key:generate --ansi
```

### 6. Run migrations

```bash
php artisan migrate
```

### 7. Add Filament Admin user

```bash
php artisan make:filament-user
```

## Production Environment

Instruction using SSH on Ubuntu 22.04 VM

### 1. SSH and update the server

```bash
ssh -i <keypair-name> <host@ip>
sudo su
apt update && apt upgrade
reboot
```

### 2. Install required PHP extension for Laravel

```bash
apt install openssl php-bcmath php-curl php-json php-mbstring php-mysql php-tokenizer php-xml php-zip php-fpm
```

### 3. Install Composer

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer
```

### 4. Install Node.js

```bash
apt update
apt install -y ca-certificates curl gnupg
mkdir -p /etc/apt/keyrings
curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
NODE_MAJOR=18
echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_MAJOR.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list
apt update
apt install nodejs -y
```

### 5. Install NGINX

```bash
apt purge apache2
apt autoremove
apt install nginx
```

### 6. Clone the project

```bash
cd /var/www/
git clone https://github.com/av1st78/inspektorat-gresik.git
```

### 7. Configure directory permissions

```bash
chown -R www-data:www-data /path/to/your/laravel/root/directory
usermod -a -G www-data ubuntu
find /path/to/your/laravel/root/directory -type f -exec chmod 644 {} \;    
find /path/to/your/laravel/root/directory -type d -exec chmod 755 {} \;
chgrp -R www-data storage bootstrap/cache
chmod -R ug+rwx storage bootstrap/cache
```

### 8. Configure NGINX

```bash
nano /etc/nginx/sites-available/<project-name>
```
```nginx
 server {
        listen 80;
        listen [::]:80;
        server_name <server_domain_or_IP>;
        root /var/www/<project-name>/public;
    
        add_header X-Frame-Options "SAMEORIGIN";
        add_header X-Content-Type-Options "nosniff";
    
        index index.php;
    
        charset utf-8;
    
        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }
    
        location = /favicon.ico { access_log off; log_not_found off; }
        location = /robots.txt  { access_log off; log_not_found off; }
    
        error_page 404 /index.php;
    
        location ~ \.php$ {
            fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
            fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
            include fastcgi_params;
        }
    
        location ~ /\.(?!well-known).* {
            deny all;
        }
    }
```
```bash
ln -s /etc/nginx/sites-available/<project-name> /etc/nginx/sites-enabled/
nginx -t
systemctl reload nginx
```

### 9. Install project dependecies

```bash
composer install --optimize-autoloader
npm install --production
```

### 10. Configure .env

```bash
cp .env.example .env
php artisan key:generate --ansi
nano .env
```
```bash
APP_NAME="<project-name>"
APP_ENV=production
APP_DEBUG = false
APP_URL=http<with 's' if ssl>://<server_domain_or_IP>
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=<db-database>
DB_USERNAME=<db-username>
DB_PASSWORD=<db-password>
```
```bash
php artisan storage:link
php artisan migrate:fresh --seed
```

### 11. Laravel optimization

```bash
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache
```

---

Instruction using hpanel

### 1. SSH, clone the project, and replace public_html link

```bash
ssh -p <port> <host@ip>
cd domains/
rm -rf <domain-name>
cd ..
rm public_html
cd domains/
git clone <git-project-repo> <domain-name>
cd ~
ln -s domains/<domain-name>/public public_html
cd domains/<domain-name>
ln -s public public_html
```

### 2. Install Composer

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

### 3. Install Node.js

```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.5/install.sh | bash
source ~/.bashrc
nvm --version
nvm ls-remote
nvm install <version>
node --v
```

### 4. Install project dependencies

```bash
php composer.phar install --optimize-autoloader
npm install --production
```

### 5. Configure .env

```bash
cp .env.example .env
php artisan key:generate --ansi
nano .env
```
```bash
APP_NAME="<project-name>"
APP_ENV=production
APP_DEBUG = false
APP_URL=http<with 's' if ssl>://<server_domain_or_IP>
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=<db-database>
DB_USERNAME=<db-username>
DB_PASSWORD=<db-password>
```
```bash
php artisan storage:link
php artisan migrate:fresh --seed
```

### 6. Laravel optimization

```bash
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache
