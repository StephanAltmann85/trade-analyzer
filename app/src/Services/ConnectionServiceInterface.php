<?php

namespace App\Services;

interface ConnectionServiceInterface {

    public function get(array $params);
    public function __construct(string $serviceBaseUrl);

}