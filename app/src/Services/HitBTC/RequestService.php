<?php

namespace App\Services\HitBTC;

use App\DTO\OrderBook;
use App\Services\ConnectionServiceInterface;
use App\Services\RequestServiceInterface;
use App\DTO\AbstractDTO;
use Unirest\Response;

/**
 * Class RequestService
 * @package App\Services\HitBTC
 */
class RequestService implements RequestServiceInterface {

    /**
     * @var ConnectionServiceInterface
     */
    private $connectionService;
    /**
     * @var string
     */
    private $service;

    /**
     * RequestService constructor.
     * @param ConnectionServiceInterface $connectionService
     * @param string $service
     */
    public function __construct(ConnectionServiceInterface $connectionService, string $service) {
        $this->connectionService = $connectionService;
        $this->service = $service;
    }

    //Todo: return array column of dto

    /**
     * @param string $symbol
     */
    public function getOrderBook(string $symbol) {

        $params = array(
            'endpoint' => 'orderbook',
            'symbol' => $symbol,
            'data' => array()
        );

        $response = $this->connectionService->get($params);
        return $this->transform(OrderBook::class, $response);
    }

    /**
     * @param string $className
     * @param Response $response
     */
    private function transform(string $className, Response $response) {

        //TODO: implement handler based on endpoint

        //$test = new $className($response, $this->service);
        //iterate -> fill arraycolum with dto


        die(var_dump($response));

    }
}