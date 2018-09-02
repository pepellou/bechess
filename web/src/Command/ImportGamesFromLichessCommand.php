<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use App\Service\LichessService;


class ImportGamesFromLichessCommand extends Command
{

    private $lichess;

    public function __construct(LichessService $lichess)
    {
        $this->lichess = $lichess;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('lichess:games')
            ->setDescription('Imports games of a user from the linked lichess account.')
            ->setHelp('Imports games of a user from the linked lichess account.')

            ->addArgument('user', InputArgument::REQUIRED, 'User lichess handle')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(print_r($this->lichess->getUser($input->getArgument('user')), true));
    }

}
