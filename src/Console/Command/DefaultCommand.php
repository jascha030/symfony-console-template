<?php

declare(strict_types=1);

namespace Jascha030\Project\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;

class DefaultCommand extends Command
{
    protected function configure()
    {
        $this->setName('default:command')
            ->setDescription('This is a default command');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('This is a default command');

        return Command::SUCCESS;
    }
}
