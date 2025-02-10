<?php

return [
    'paths' => ['*'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'OPTIONS'],
    'allowed_origins' => ['https://navet21.github.io/frontcompostaje/'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['Origin', 'Content-Type', 'X-Auth-Token', 'Cookie'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];