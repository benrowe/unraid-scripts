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
        $binding = $this->identifyBinding($request);
        $validToken = (new ValidateBindingToken($binding->token))->fromRequest($request)->isValid();
        if (!$validToken) {
            $mapping->run($app);
        }

        // verify the token (?token={token}, $_POST['token'], x-webhook-token: {token})
        var_dump($request);
    }

    private function identifyBinding($request)
    {
        // get webhook -> bindings
        // itereate through

    }


}