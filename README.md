## Todo test application

The application is written in PHP and uses the Laravel framework. A sqlite database is used for storage and testing frameworks behat and phpspec are used for
functional/unit tests.

### Installation

* Clone the repo
* In the project root run: `composer install`
* In /public run `bower install`
* Start a local server with `php artisan serve`


### Tests

There are both functional tests written with behat and unit tests written with phpspec
 
 * To run the functional test suite run: `vendor/bin/behat` in the project root
 * To run the unit tests run: `vendor/bin/phpspec run` in the project root
