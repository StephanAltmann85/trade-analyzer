<?php

namespace App\Services;

use App\DTO\OrderBook;
use Doctrine\Common\Collections\ArrayCollection;

interface RequestServiceInterface {

    public function __construct(ConnectionServiceInterface $connectionService, string $exchange);

    public function getOrderBook(string $string) :?ArrayCollection;
}