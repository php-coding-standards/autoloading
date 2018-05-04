travis_retry composer install --no-interaction
wget -c -nc --retry-connrefused --tries=0 https://github.com/php-coveralls/php-coveralls/releases/download/v2.0.0/php-coveralls.phar
chmod +x php-coveralls.phar
php php-coveralls.phar --version
