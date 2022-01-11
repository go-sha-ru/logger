<?php

use Logger\Handlers\FileHandler;
use Logger\Logger;
use Logger\LogLevel;

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../' . str_replace('\\', '/', $className) . '.php';
});

$logger = new Logger();

$FileHandler = new FileHandler(
    [
        'is_enabled' => true,
        'filename' => __DIR__ . '/application.log',
        'formatter' => new \Logger\Formatters\LineFormatter(),
    ]
);

$logger->addHandler($FileHandler);

$logger->addHandler(
    new \Logger\Handlers\FileHandler(
        [
            'is_enabled' => true,
            'filename' => __DIR__ . '/application.error.log',
            'levels' => [
                \Logger\LogLevel::LEVEL_ERROR,
            ],
            'formatter' => new \Logger\Formatters\LineFormatter(
                '%date%  [%level_code%]  [%level%]  %message%',
                'Y-m-d H:i:s'
            ),
        ]
    )
);

$logger->addHandler(
    new \Logger\Handlers\FileHandler(
        [
            'is_enabled' => true,
            'filename' => __DIR__ . '/application.info.log',
            'levels' => [
                \Logger\LogLevel::LEVEL_INFO,
            ],
            'formatter' => new \Logger\Formatters\LineFormatter(
                '%date%  [%level_code%]  [%level%]  %message%',
                'Y-m-d H:i:s'
            ),
        ]
    )
);


$logger->log(\Logger\LogLevel::LEVEL_ERROR, 'Error message');
$logger->error('Error message');

$logger->log(\Logger\LogLevel::LEVEL_INFO, 'Info message');
$logger->info('Info message');

$logger->log(\Logger\LogLevel::LEVEL_DEBUG, 'Debug message');
$logger->debug('Debug message');

$logger->log(\Logger\LogLevel::LEVEL_NOTICE, 'Notice message');
$logger->notice('Notice message');

$FileHandler->log(\Logger\LogLevel::LEVEL_INFO, 'Info message from FileHandler');
$FileHandler->info('Info message from FileHandler');

$FileHandler->setIsEnabled(false);

$FileHandler->log(\Logger\LogLevel::LEVEL_INFO, 'Info message from FileHandler');
$FileHandler->info('Info message from FileHandler');

