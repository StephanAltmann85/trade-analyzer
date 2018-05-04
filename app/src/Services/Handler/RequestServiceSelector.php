<?php

namespace App\Services\Handler;

use App\Services\RequestServiceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
     * @param $name
     * @return RequestServiceInterface
     * @throws \Exception
     */
    public function get($name) {
        try {

            $service = $this->container->get('App\\Services\\' . $name . '\\RequestService');
            return $service;

        } catch (\Exception $e) {

            if(!isset($service)) {
                throw new \Exception('Request Handler for Service ' . $name . ' is not defined!');
            }
        }
    }


}