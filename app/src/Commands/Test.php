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
     * @var RequestServiceSelector
     */
    private $requestServiceSelector;

    /**
     * @var RequestServiceInterface
     */
    private $requestService;

    /**
     * Test constructor.
     * @param RequestServiceSelector $requestServiceSelector
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
            ->setName('app:test')
            ->setDescription('does something')
            ->setHelp('')
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
        //TODO: final structure command Exchnage Endpoint
        //TODO: add exception if method is not availabe


        $this->requestService = $this->requestServiceSelector->get('HitBTC');

        $test = $this->requestService->getOrderBook('ATMBTC');

        die(var_dump($test));

        //Todo: store to database
    }
}