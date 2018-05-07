<?php

namespace App\Services\Test;

use App\DTO\OrderBook;
use App\Services\BaseRequestService;
use App\Services\RequestServiceInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class RequestService
 * @package App\Services\HitBTC
 */
class RequestService extends BaseRequestService implements RequestServiceInterface {

    //TODO: add test
    //register services
    //check transformed response

    /**
     * @param string $symbol
     * @return ArrayCollection
     * @throws \Exception
     */
    public function getOrderBook(string $symbol) {

        //TODO: check response
        //TODO: transform response
    }
}