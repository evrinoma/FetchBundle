#/!bin/bash

log=/tmp/test.dump
echo > $log

rm -rf vendor
rm -rf composer.lock
COMPOSER_NO_DEV=0 composer install
rm -rf /tmp/FetchBundle

/usr/bin/php vendor/phpunit/phpunit/phpunit --bootstrap src/Tests/bootstrap.php --configuration phpunit.xml.dist src/Tests >> $log 2>&1
status=$(cat $log | grep "ERRORS!")
[ -z "$status" ] && exit 0 ||  exit -1