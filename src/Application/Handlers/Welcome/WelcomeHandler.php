<?php

namespace App\Application\Handlers\Welcome;

use Fig\Http\Message\StatusCodeInterface;
use GraphQL\GraphQL;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Response;

class WelcomeHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $stream = (new StreamFactory())->createStream("hello word");

        $response = new Response(status: StatusCodeInterface::STATUS_OK, body: $stream);
        $response->withHeader(name: "tracking_id",  value: "id-fake-test-16515615616");
        
        return $response;
    }
}