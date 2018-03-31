<?php

use App\Console;
use Noodlehaus\Config;

$rootDir = realpath(__DIR__.'/../');
require_once $rootDir.'/vendor/autoload.php';

// env variables
if (file_exists($rootDir.'/data/.env')) {
    $dotenv = new Dotenv\Dotenv($rootDir.'/data/');
    $dotenv->load();
}

$application = new Console('Unraid Scripts', '1.0');

// detect and load console commands from the App\Command namespace
Console::load($application, 'App\Command', 'src/Command');
Console::load($application, 'App\Commands', 'data/commands');

// load application config
$config = new Config($rootDir.'/data/config.yml');
$application->setConfig($config);

return $application;