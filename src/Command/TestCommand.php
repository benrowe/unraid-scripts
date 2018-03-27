<?php

namespace App\Command;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
}