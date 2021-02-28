# A single-page application (SPA) with Slim Framework and Vue.js

Source code of the tutorial at https://tpetersdorf.dev/tutorials/a-single-page-application-spa-with-slim-framework-and-vue-js/.

## Quick start

Start the docker containers:

    docker-compose up -d

SSH into the php container:

    docker exec -it php-fpm bash

Change to the document root:

    cd html

Use composer to build the backend:

    php composer.phar install

Use yarn to install the frontend dependencies:

    yarn

Build the frontend:

    yarn build

Access the app at http://localhost.

## Code style

The project uses [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to enforce code style 
rules for the PHP code. We are following a slightly adapted 
[Symfony code style](https://symfony.com/doc/current/contributing/code/standards.html).

The JavaScript and Vue.js code follows Vue.js [recommend code style](https://v3.vuejs.org/style-guide/#priority-c-recommended)
as well as [StandardJs](https://standardjs.com/).

For details see: https://tpetersdorf.dev/tutorials/static-analysis-part-1-code-style-tools/

## Code quality

The project uses

* [PHPMD](https://phpmd.org/)
* [PHPStan](https://phpstan.org/)
* [PSALM](https://psalm.dev/)

to improve the code quality

For details see: https://tpetersdorf.dev/tutorials/static-analysis-part-2-code-quality-tools/