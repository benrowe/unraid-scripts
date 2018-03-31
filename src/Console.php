<?php declare(strict_types=1);

namespace App;

use Noodlehaus\Config;
use Koriym\Psr4List\Psr4List;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;


/**
 * Console helper
 *
 * @package App
 */
class Console extends Application
{
    private $config;

    /**
     * Load console commands into the application based on the supplied namespace
     *
     * @param  Application $application [description]
     * @param  string      $namespace   The desired namespace to load the
     *                                  commands from
     * @param  string      $path        The path that matches the supplied
     *                                  namespace
     * @return bool
     */
    public static function load(Application $application, string $namespace, string $path) : bool
    {
        if (!is_dir($path)) {
            return false;
        }
        $list = new Psr4List;

        // go through each php class it can find
        foreach ($list($namespace, $path) as list($class, $file)) {
            $cmd = new $class;
            if ($cmd instanceof Command) {
                $application->add($cmd);
            }
        }

        return true;

    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function setConfig(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Handle the webhook request and return
     */
    public static function handleRequest(Request $request): ?Command
    {
        // convert the request url into a relevant command
        return null;
    }
}