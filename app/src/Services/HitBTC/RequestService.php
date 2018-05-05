<?php

namespace App\Services\HitBTC;

use App\DTO\OrderBook;
use App\Services\RequestServiceInterface;
use App\DTO\AbstractDTO;

class RequestService implements RequestServiceInterface {

    private $connectionService;

    public function __construct(ConnectionService $connectionService) {
        $this->connectionService = $connectionService;
    }

    //Todo: return array column of dto
    public function getOrderBook(string $symbol) {
        $params = array(
            'endpoint' => 'orderbook',
            'symbol' => $symbol
        );

        $response = $this->connectionService->get($params);
        return $this->transform(OrderBook::class, $response);
    }

    private function transform(string $className, string $response) {
        //TODO: decode
        //iterate -> fill arraycolum with dto

        die(var_dump($response));

    }
}