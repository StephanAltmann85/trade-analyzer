<?php

namespace App\DTO;

use App\Services\TransformerInterface;

abstract class AbstractDTO {
    /**
     * OrderBook constructor.
     * @param array $element
     * @param TransformerInterface $transformer
     */
    public function __construct(array $element, TransformerInterface $transformer) {
        $transformer->assign($element, $this);
    }
}