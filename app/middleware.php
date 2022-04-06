<?php

use App\Application\Middleware\SessionMiddleware;
use Slim\App;

return function (App $app): void
{
    $app->add(SessionMiddleware::class);
};
