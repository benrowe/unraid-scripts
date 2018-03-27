<?php

require_once 'vendor/autoload.php';

use App\Console;

$application = new Console('Unraid Scripts', '1.0');

// detect and load console commands from the App\Command namespace
Console::load($application, 'App\Command', 'src/Command');
Console::load($application, 'App\Commands', 'data/commands');

return $application;
