<?php

namespace App;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Koriym\Psr4List\Psr4List;

/**
 * Console helper
  *
 * @package App
 */
class Console
{

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
}
