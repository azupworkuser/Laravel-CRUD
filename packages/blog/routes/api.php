<?php

$router = app('Dingo\Api\Routing\Router');
//'middleware'=>['api.auth', 'api.throttle']
$router->version('v1', ['namespace' => 'Blog\Http\Controllers\Api', 'middleware' => ['api.auth']], function ($api) {
    include __DIR__ . '/version1.php'; // Include the api route file.
});