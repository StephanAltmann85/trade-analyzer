<?php

namespace App\Services\HitBTC;

use App\DTO\OrderBook;
use App\Services\BaseRequestService;
use App\Services\ConnectionServiceInterface;
use App\Services\RequestServiceInterface;
use App\DTO\AbstractDTO;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class RequestService
 * @package App\Services\HitBTC
 */
class RequestService extends BaseRequestService implements RequestServiceInterface {

    /**
     * @param string $symbol
     *
     * @return ArrayCollection
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