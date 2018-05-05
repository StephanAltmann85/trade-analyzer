<?php

namespace App\Services;

interface TransformerInterface {

    public function transform(string $className, array $response);

}