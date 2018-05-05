<?php

namespace App\Services\HitBTC;

use App\DTO\OrderBook;
use App\Services\ConnectionServiceInterface;
use App\Services\RequestServiceInterface;
use App\DTO\AbstractDTO;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
    private $exchange;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * RequestService constructor.
     * @param ConnectionServiceInterface $connectionService
     * @param string $exchange
     * @param ContainerInterface $container
     *
     * Container has been added for accessing transformers dynamically
     */
    public function __construct(ConnectionServiceInterface $connectionService,
                                string $exchange,
                                ContainerInterface $container) {
        $this->connectionService = $connectionService;
        $this->exchange = $exchange;
        $this->container = $container;
    }

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
        return $this->container->get('App\Services\HitBTC\Transformer\OrderBook')
                ->transform(OrderBook::class, $response);
    }
}