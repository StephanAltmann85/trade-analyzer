<?php

namespace App\DTO;

/**
 * Class OrderBook
 * @package App\DTO
 */
class OrderBook extends AbstractDTO {


    /**
     * @var integer
     *
     * 1: ask
     * 2: bid
     */
    public $type;

    /**
     * @var float
     */
    public $value;

    /**
     * @var float
     */
    public $quantity;

    //TODO: define response type

    /**
     * OrderBook constructor.
     * @param string $response
     * @param string $service
     */
    public function __construct(string $response, string $service) {
        $this->{'assignValues' . $service}($response);
    }

    /**
     * @param string $response
     */
    private function assignValuesHitBTC(string $response) {

    }
}