<?php

namespace App\Services\StockExchange;

use App\Services\ConnectionServiceInterface;

class ConnectionService implements ConnectionServiceInterface {

    public function __construct() {

    }

    public function connect() {
        echo 'hallo';
    }



}