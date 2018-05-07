<?php

namespace App\Services\HitBTC;

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
    //extend baseRequestService in Tests
    //extend BaseConnectionService in Test
    //use service selector
    //return string response -> check if given

    /**
     * @param string $symbol
     * @return ArrayCollection
     * @throws \Exception
     */
    public function getOrderBook(string $symbol) {

        $params = array(
            'endpoint' => 'orderbook',
            'symbol' => $symbol,
            'query' => array('limit' => 20)
        );

        $response = $this->connectionService->get($params);

        if($response === NULL) {
            throw new \Exception('Empty response');
        }

        return $this->container->get('App\Services\HitBTC\Transformer\OrderBook')
                ->transform(OrderBook::class, $response);
    }
}