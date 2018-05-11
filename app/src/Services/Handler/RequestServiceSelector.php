<?php

namespace App\Services\Handler;

use App\Services\RequestServiceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
    public function get($exchange) {

        try {

            $service = $this->requestServices[$exchange];
            return $service;

        } catch (\Exception $e) {

            if(!isset($service)) {
                throw new \Exception('Request Handler for Service ' . $exchange . ' is not defined!');
            }
        }
    }


}