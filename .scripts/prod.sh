#!/bin/sh

    echo "Empieza el deploy"

    cd /var/www/html/EcoCompostajeV2

    git pull

    php artisan optimize:clear

    sudo service php8.3-fpm reload

    npm run build

    echo "Deploy terminado"