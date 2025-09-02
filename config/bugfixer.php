<?php

return [
    'enabled'  => env('BUGFIXER_ENABLED', true),
    'endpoint' => env('BUGFIXER_ENDPOINT', 'https://api.bugfixer.com'),
    'api_key'  => env('BUGFIXER_API_KEY', ''),
];
