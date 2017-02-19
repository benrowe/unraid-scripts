<?php

/**
 * entry point for cli application
 */

require_once 'vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application('Unraid Scripts', '1.0');

// detect and load console commands from the App\Command namespace
App\Console::load($application, 'App\Command', 'src/Command');

$application->run();
