<?php

namespace App\Commands;

use App\Services\Handler\RequestServiceSelector;
use App\Services\RequestServiceInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Test extends Command
{

    /**
     * @var RequestServiceInterface
     */
    private $requestService;

    private $requestServiceSelector;

    /**
     * Test constructor.
     */
    public function __construct(RequestServiceSelector $requestServiceSelector) {
        parent::__construct();
        $this->requestServiceSelector = $requestServiceSelector;
    }

    /**
     *
     */
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:test')

            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new user.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to create a user...')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //TODO: output


        $this->requestService = $this->requestServiceSelector->get('HitBTC');

        $this->requestService->getOrderBook('ATMBTC');

        //Todo: store to database
    }
}