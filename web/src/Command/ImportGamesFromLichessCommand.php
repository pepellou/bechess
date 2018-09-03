<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
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
        $user = $this->lichess->getUser($input->getArgument('user'));

        $section1 = $output->section();

        $progressBar = new ProgressBar($section1);

        $progressBar->start($user->count['all']);

        $this->lichess->streamGames(
            $input->getArgument('user'),
            function($toPrint) use($output, $progressBar) {
                /*
                $output->writeln(" >>>>>>>>>>>>>>");
                $output->writeln($toPrint);
                $output->writeln(" <<<<<<<<<<<<<<");
                 */
                $progressBar->advance();
            },
            0.2 * $user->count['all']
        );
    }

}
