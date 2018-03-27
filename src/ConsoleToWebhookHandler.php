<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;

class ConsoleToWebhookHandler
{
    private $app;

    public function __construct(Console $app)
    {
        $this->app = $app;
    }

    public function processRequest(Request $request)
    {
        // identify which mapping is requested by the url structure
        // /{endpoint}
        // or x-webhook-endpoint: {endpoint}

        // verify the token (?token={token}, $_POST['token'], x-webhook-token: {token})
        var_dump($request);
    }


}