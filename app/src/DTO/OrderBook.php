<?php

namespace App\DTO;

/**
 * Class OrderBook
 * @package App\DTO
 */
class OrderBook extends AbstractDTO {


    /**
     * @var integer
     */
    public $type;

    public $value;

    public $quantity;

    //TODO: define response type
    public function __construct(string $response, string $service) {
        $this->{'assignValues' . $service}($response);
    }

    private function assignValuesHitBTC(string $response) {

    }
}