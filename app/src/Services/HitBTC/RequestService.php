<?php

namespace App\Services\HitBTC;

use App\Services\RequestServiceInterface;

class RequestService implements RequestServiceInterface {

    private $connectionService;

    public function __construct(ConnectionService $connectionService) {
        $this->connectionService = $connectionService;
    }

    public function getOrderBook() {
        echo 'hello';
    }
}