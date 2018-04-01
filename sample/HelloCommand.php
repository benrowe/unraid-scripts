<?php

namespace App\Commands;

use Hashids\Hashids;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends \Symfony\Component\Console\Command\Command
{
    protected function configure()
    {
        $this
            ->setName('hello:world');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $hashids = new Hashids();
        $output->writeln('Hello, ' . $hashids->encode(1));
        $output->writeln(getenv('SAMPLE_DATA'));
    }
}