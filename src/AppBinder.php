<?php declare(strict_types=1);

namespace App;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\BufferedOutput;

class AppBinder
{
    private $app;
    private $binding;
    private $request;

    public function __construct(Application $app, Request $request, Binding $binding)
    {
        $this->app = $app;
        $this->request = $request;
        $this->binding = $binding;
    }

    public function run()
    {
        $output = new BufferedOutput;

        foreach ($this->binding->commands as $cmd) {
            $input = $this->getConsoleInput($cmd['name'], $cmd['handler'] ?? null);
            $this->app->run($input, $output);
        }

        // @todo write output to log file?
    }

    private function getConsoleInput(string $cmdName, ?string $handler): InputInterface
    {
        $input = new ArrayInput([
            'command' => $cmdName
        ]);
        if ($handler) {
            $input = call_user_func($handler);
            if (!($input instanceof InputInterface)) {
                throw new \RuntimeException($handler . ' is not instance of ' . InputInterface::class);
            }

        }
        return $input;
    }
}