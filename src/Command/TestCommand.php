<?php

namespace App\Command;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;

class TestCommand extends \Symfony\Component\Console\Command\Command
{
    protected function configure()
    {
        $this
            ->setName('hello:world');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello, World');
    }

    public static function handleRequest()
    {
        return new ArrayInput([
            'command' => 'hello:world'
        ]);
    }
}