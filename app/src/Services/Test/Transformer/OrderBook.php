<?php

namespace App\Services\Test\Transformer;

use App\Services\TransformerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use App\DTO\AbstractDTO;

/**
 * Class OrderBook
 * @package App\Services\Test\Transformer
 */
class OrderBook implements TransformerInterface {

    /**
     * Trasforms response into array collection of entities
     *
     * @param string $className
     * @param array $response
     * @return ArrayCollection
     */
    public function transform(string $className, array $response) {

        //TODO: transform something

        return $entities;
    }

    /**
     * @param array $element
     * @param AbstractDTO $target
     */
    public function assign(array $element, AbstractDTO $target) : void {

    }

}