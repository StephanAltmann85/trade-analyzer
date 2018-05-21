<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RequestTest extends KernelTestCase
{
    private $container;

    private $requestService;

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

    }

    public function testRequest() {

    }

    public function testAssigningValueFromRequest() {

    }

    public function testTranformationOfRequestValueAssociation() {

    }

    //TODO: test dto compatibility

    //TODO: test error handling
        //wrong service
        //no response
        //wrong response statuscode
        //wrong response structure
        //
}
