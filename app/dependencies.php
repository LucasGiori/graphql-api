<?php

use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return function (ContainerBuilder $containerBuilder): void
{
    $logger = function (ContainerInterface $container) {
        /** @var SettingsInterface $settings */
        $settings = $container->get(SettingsInterface::class);
        $loggerSettings = $settings->get(key: 'logger');
        $processor = new UidProcessor();
        $logger = new Logger(name:$loggerSettings['name'], processors: $processor);

        $handler = new StreamHandler(stream: $loggerSettings['path'], level: $loggerSettings['level']);
        $logger->pushHandler(handler: $handler);

        return $logger;
    };

    $dependencies = [
        LoggerInterface::class => $logger
    ];

    $containerBuilder->addDefinitions(definitions: $dependencies);
};
