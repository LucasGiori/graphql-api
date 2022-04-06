<?php

use App\Application\Handlers\Graphql\GraphqlHandler;
use App\Application\Handlers\Welcome\WelcomeHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function(App $app)
{
    $app->options(pattern: "/{routes:.*}", callable: function (Request $request, Response $response) {
        return $response;
    });

    $app->get(pattern: "/", callable: WelcomeHandler::class);
    $app->post(pattern: "/", callable: GraphqlHandler::class);
};