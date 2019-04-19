<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RequestTest extends KernelTestCase
{
    private $container;

    private $requestService;

    //TODO: replace by used service with replaced connection response

    public function __construct() {
        self::bootKernel();

        // returns the real and unchanged service container
        $this->container = self::$kernel->getContainer();
    }

    public function testIfServiceCanBeSelected() {
        $serviceSelector = $this->container->get('App\Services\Handler\RequestServiceSelector');
        $this->requestService = $serviceSelector->get('Test');

        $this->assertInstanceOf('App\Tests\Services\Test\RequestService',
            $this->requestService,
            'RequestService via ServiceSelector not found!'
        );
    }

    public function testConnection() {
        $connectionService = $this->container->get('App\Tests\Services\Test\ConnectionService');
        $response = $connectionService->get(array());

        $this->assertNotEmpty($response, 'Expecting not empty array as return of ConnectionService->get()');

    }

    public function testTranformationOfRequestValueAssociation() {
        //expected:
        //array column containing ask & bid
    }

    public function testAssigningValueFromRequest() {
        //expected:
        //type
        //exchange
        //price
        //quantity
    }

    public function testRequest() {
        //expected:
        //array column containing valid entities
        //->test if array colum
        //->test if entity is valid
    }

    //TODO: test error handling
    //wrong service
    //no response
    //wrong response statuscode
    //wrong response structure
}
