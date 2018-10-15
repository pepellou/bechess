<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;


use App\Service\LichessService;


class GetUserFromLichessCommand extends Command
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
            ->setName('lichess:user')
            ->setDescription('Shows public info of given lichess user.')
            ->setHelp('Shows public info of given lichess user.')

            ->addArgument('user', InputArgument::REQUIRED, 'User lichess handle')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $section1 = $output->section();
        $section2 = $output->section();

        $progress1 = new ProgressBar($section1);
        $progress2 = new ProgressBar($section2);

        $progress1->start(100);
        $progress2->start(100);

        $i = 0;
        while (++$i < 100) {
            $progress1->advance();

            if ($i % 2 === 0) {
                $progress2->advance(4);
            }

            usleep(50000);
        }


        $output->writeln(print_r($this->lichess->getUser($input->getArgument('user')), true));
    }

}
