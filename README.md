https://roman-huliak.medium.com/how-to-structure-a-php-project-best-practices-and-real-examples-a934b44ac90d
How to Structure a PHP Project: Best Practices and Real Examples

https://www.reddit.com/r/PHP/comments/acmp63/what_composer_packages_do_you_always_install_and/
PHP composer packages

<!-- https://github.com/vlucas/phpdotenv
Imports .env files and creates $_ENV and $_SERVER variables -->

https://github.com/symfony/dotenv
Parses .env files to make environment variables stored in them accessible via $_SERVER or $_ENV

composer require --dev phpunit/phpunit
PHP Unit testing

<!-- https://docs.guzzlephp.org/en/stable/overview.html
composer require guzzlehttp/guzzle:^7.0
PHP HTTP client that makes it easy to send HTTP requests and trivial to integrate with web services -->

https://psalm.dev/docs/running_psalm/installation/
Static analysis tool that helps you identify problems in your code

https://github.com/ThingEngineer/PHP-MySQLi-Database-Class
Database class

https://www.ip2location.io/dashboard
IP Location for getting user location information

https://github.com/michalsnik/aos?tab=readme-ov-file
https://michalsnik.github.io/aos/
https://css-tricks.com/aos-css-driven-scroll-animation-library/
Animate on scroll

https://github.com/PHPMailer/PHPMailer
PHP Mailer for sending email

<!-- install and start up -->

composer install

./vendor/bin/phpunit tests
./vendor/bin/phpunit tests --display-phpunit-deprecations
./vendor/bin/phpunit --display-phpunit-deprecations tests

cd public_html
php -S localhost:8080