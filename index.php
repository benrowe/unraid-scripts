<?php

/**
 * entry point for webhook application
 */

use App\ConsoleToWebhookHandler;
use Symfony\Component\HttpFoundation\Request;

/** */
$app = require_once 'src/bootstrap.php';

$handler = new ConsoleToWebhookHandler($app);
$handler->processRequest(Request::createFromGlobals());
