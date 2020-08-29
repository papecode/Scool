<?php

namespace Aschmelyun\Cleaver\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Aschmelyun\Cleaver\Cleaver;

class BuildCommand extends Command
{

    protected static $defaultName = 'build';

    protected function configure()
    {
        $this->setDescription('Builds the site')
            ->setHelp('This command compiles all of your content files into static HTML and saves them in a directory tree under /dist');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            '',
            'Building Site',
            '=============',
        ]);

        $cleaver = new Cleaver(dirname(__FILE__, 3));
        $cleaver->build();

        $output->writeln(['']);

        return Command::SUCCESS;
    }

}