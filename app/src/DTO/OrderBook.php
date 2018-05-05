<?php

namespace App\DTO;

/**
 * Class OrderBook
 * @package App\DTO
 */
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
    public $price;

    /**
     * @var float
     */
    public $quantity;

    /**
     * @var string
     */
    public $service;

    /**
     * OrderBook constructor.
     * @param string $element
     * @param string $service
     */
    public function __construct(array $element, string $service) {
        $this->service = $service;
        $this->{'assignValues' . $service}($element);
    }

    /**
     * @param string $element
     */
    private function assignValuesHitBTC(array $element) {

        if($element["type"] == "ask") {
            $this->type = 1;
        }
        elseif ($element["type"] == "bid") {
            $this->type = 2;
        }

        $this->price = $element["price"];
        $this->quantity = $element["size"];
    }
}