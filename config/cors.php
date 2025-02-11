<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['GET', "POST", "PATCH", "PUT", "DELETE"],

    'allowed_origins' => ['https://navet21.github.io'],

'allowed_origins_patterns' => ['/^https:\/\/navet21\.github\.io\/frontcompostaje/'],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];