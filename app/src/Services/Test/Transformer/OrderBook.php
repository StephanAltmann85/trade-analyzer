<?php

namespace App\Services\Test\Transformer;

use App\Services\TransformerInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class OrderBook
 * @package App\Services\HitBTC\Transformer
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

        $entities = new ArrayCollection();

        foreach ($response["ask"] as &$element) {
            // type is missing, add to value
            $element['type'] = 'ask';

            $entity = new $className($element, 'HitBTC');
            $entities->add($entity);
        }

        foreach ($response["bid"] as &$element) {
            $element['type'] = 'bid';

            $entity = new $className($element, 'HitBTC');
            $entities->add($entity);
        }

        return $entities;
    }

}