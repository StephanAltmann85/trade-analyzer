<?php

namespace App\Services;

interface RequestServiceInterface {

    public function __construct(ConnectionServiceInterface $connectionService, string $service);

}