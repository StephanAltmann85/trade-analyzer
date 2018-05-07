<?php

namespace App\Services;

use App\Services\ConnectionServiceInterface;
use Unirest;

/**
 * Class ConnectionService
 * @package App\Services\HitBTC
 */
abstract class BaseConnectionService implements ConnectionServiceInterface {

    /**
     * @var string
     */
    public $serviceBaseUrl;

    /**
     * ConnectionService constructor.
     * @param string $serviceBaseUrl
     */
    public function __construct(string $serviceBaseUrl) {
        $this->serviceBaseUrl = $serviceBaseUrl;
    }
}