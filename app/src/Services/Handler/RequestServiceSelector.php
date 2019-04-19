<?php

namespace App\Services\Handler;

use App\Services\RequestServiceInterface;

/**
 * Class RequestServiceSelector
 * @package App\Services\Handler
 */
class RequestServiceSelector {

    /**
     * @var array
     */
    private $requestServices;

    /**
     * RequestServiceSelector constructor.
     * @param array $requestServices
     */
    public function __construct(array $requestServices)
    {
        $this->requestServices = $requestServices;
    }

    /**
     * @param $exchange
     * @return RequestServiceInterface
     * @throws \Exception
     */
    public function get($exchange) :?RequestServiceInterface {

        try {

            $service = $this->requestServices[$exchange];
            return $service;

        } catch (\Exception $e) {

            if(!isset($service)) {
                throw new \RuntimeException('Request Handler for Service ' . $exchange . ' is not defined!');
            }
        }

        return null;
    }
}