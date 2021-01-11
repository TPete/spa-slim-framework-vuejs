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
