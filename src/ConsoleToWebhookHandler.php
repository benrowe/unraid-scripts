<?php declare(strict_types=1);

namespace App;

use Noodlehaus\Config;
use Symfony\Component\HttpFoundation\Request;
use Teapot\StatusCode;
use Teapot\HttpException;

class ConsoleToWebhookHandler
{
    private $app;
    private $config;

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
        if (!$binding) {
            throw new HttpException('Unknown webhook', StatusCode::NOT_FOUND);
        }

        $validToken = (new ValidateBindingToken((string)$binding->token))->isValid($request);
        if (!$validToken) {
            throw new HttpException('Invalid authentication', StatusCode::FORBIDDEN);
        }
        (new AppBinder($this->app, $request, $binding))->run();
    }

    private function identifyBinding(Request $request): ?Binding
    {
        $bindings = $this->getConfig()->get('webhooks.bindings');

        foreach ($bindings as $bind) {
            if ($this->matchBinding($bind['id'], $request)) {
                return $this->makeBinding($bind);
                break;
            }
        }
        return null;
    }

    /**
     * Check to see if the route or x-webhook-endpoint header matches the supplied id
     */
    private function matchBinding(string $id, Request $request): bool
    {
        $id = strtolower($id);
        return
            strtolower((string)$request->headers->get('x-webhook-endpoint')) === $id ||
            strtolower(ltrim($request->getPathInfo(), '/')) === $id;
    }

    private function makeBinding(array $binding): Binding
    {
        $obj = new Binding;
        $obj->id = $binding['id'];
        $obj->token = $binding['token'];
        $obj->commands = $binding['commands'];
        return $obj;
    }

    private function getConfig(): Config
    {
        return $this->app->getConfig();
    }
}