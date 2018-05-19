<?php

namespace App\DTO;

/**
 * Class OrderBook
 * @package App\DTO
 */

use App\Services\TransformerInterface;

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

    /**
     * OrderBook constructor.
     * @param array $element
     * @param TransformerInterface $transformer
     */
    public function __construct(array $element, TransformerInterface $transformer) {
        $transformer->assign($element, $this);
    }
}