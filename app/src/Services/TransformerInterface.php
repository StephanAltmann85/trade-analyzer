<?php

namespace App\Services;

use App\DTO\AbstractDTO;

interface TransformerInterface {

    public function transform(string $className, array $response);
    public function assign(array $element, AbstractDTO $target) : void;

}