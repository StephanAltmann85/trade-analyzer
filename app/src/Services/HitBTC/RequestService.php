<?php

namespace App\Services\HitBTC;

use App\DTO\OrderBook;
use App\Services\BaseRequestService;
use Doctrine\Common\Collections\ArrayCollection;
use App\Services\TransformerInterface;

/**
 * Class RequestService
 * @package App\Services\HitBTC
 */
class RequestService extends BaseRequestService {

    /**
     * @var TransformerInterface
     */
    public $orderBookTransformer;

    /**
     * @param TransformerInterface $orderBookTransformer
     */
    public function setOrderBookTransformer(TransformerInterface $orderBookTransformer): void
    {
        $this->orderBookTransformer = $orderBookTransformer;
    }

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
    public function getOrderBook(string $symbol) : ?ArrayCollection
    {
        $params = array(
            'endpoint' => 'orderbook',
            'symbol' => $symbol,
            'query' => array('limit' => 20)
        );

        $response = $this->connectionService->get($params);

        if($response === NULL) {
            throw new \RuntimeException('Empty response');
        }

        return $this->orderBookTransformer
                ->transform(OrderBook::class, $response);
    }
}