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
     * @var ContainerInterface
     */
    private $container;

    /**
     * RequestServiceSelector constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param $exchange
     * @return RequestServiceInterface
     * @throws \Exception
     */
    public function get($exchange) {
        try {

            $service = $this->container->get('App\\Services\\' . $exchange . '\\RequestService');
            return $service;

        } catch (\Exception $e) {

            if(!isset($service)) {
                throw new \Exception('Request Handler for Service ' . $exchange . ' is not defined!');
            }
        }
    }


}