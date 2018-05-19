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
    public $exchange;


}