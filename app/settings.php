<?php


use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder): void
{
    $settings = function () {
        return new Settings([
            'displayErrorDetails' => true, // Should be set to false in production
            'logError'            => false,
            'logErrorDetails'     => false,
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
        ]);
    };

    $dependencies = [
        SettingsInterface::class => $settings
    ];

    $containerBuilder->addDefinitions(definitions: $dependencies);
};
