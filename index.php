<?php

/**
 * entry point for webhook application
 */

use Symfony\Component\HttpFoundation\Request;
use App\ConsoleToWebhookHandler;

/** */
$app = require_once 'src/bootstrap.php';

$handler = new ConsoleToWebhookHandler($app);
$handler->processRequest(Request::createFromGlobals());
