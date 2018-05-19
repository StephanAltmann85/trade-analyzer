<?php

namespace App\Services\HitBTC\Transformer;

use App\DTO\AbstractDTO;
use App\Services\TransformerInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class OrderBook
 * @package App\Services\HitBTC\Transformer
 */
class OrderBook implements TransformerInterface {

    /**
     * Transforms response into array collection of entities
     *
     * @param string $className
     * @param array $response
     * @return ArrayCollection
     */
    public function transform(string $className, array $response) {

        $entities = new ArrayCollection();

        foreach ($response["ask"] as &$element) {
            // type is missing, add to value
            $element['type'] = 'ask';

            $entity = new $className($element, $this);
            $entities->add($entity);
        }

        foreach ($response["bid"] as &$element) {
            $element['type'] = 'bid';

            $entity = new $className($element, $this);
            $entities->add($entity);
        }

        return $entities;
    }

    /**
     * @param array $element
     */
    public function assign(array $element, AbstractDTO $target) : void {
        $target->exchange = 'HitBTC';

        if($element["type"] == "ask") {
            $target->type = 1;
        }
        elseif ($element["type"] == "bid") {
            $target->type = 2;
        }

        $target->price = $element["price"];
        $target->quantity = $element["size"];
    }

}