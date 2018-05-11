<?php

namespace App\Services;

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
abstract class BaseRequestService implements RequestServiceInterface {

    /**
     * @var ConnectionServiceInterface
     */
    public $connectionService;
    /**
     * @var string
     */
    public $exchange;

    /**
     * RequestService __construct.
     * @param ConnectionServiceInterface $connectionService
     * @param string $exchange
     *
     * Container has been added for accessing transformers dynamically
     */
    public function __construct(ConnectionServiceInterface $connectionService,
                                string $exchange) {
        $this->connectionService = $connectionService;
        $this->exchange = $exchange;
    }
}