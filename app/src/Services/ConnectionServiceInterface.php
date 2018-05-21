<?php

namespace App\Services;

interface ConnectionServiceInterface {

    public function get(array $params) : array;
    public function __construct(string $serviceBaseUrl);

}