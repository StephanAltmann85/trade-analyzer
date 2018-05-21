<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RequestTest extends KernelTestCase
{
    private $container;

    public function __construct() {
        self::bootKernel();

        // returns the real and unchanged service container
        $this->container = self::$kernel->getContainer();
    }

    public function testIfServiceCanBeSelected() {
        $serviceSelector = $this->container->get('App\Services\Handler\RequestServiceSelector');
        $this->assertInstanceOf('App\Tests\Services\Test\RequestService',
            $serviceSelector->get('Test'),
            'RequestService via ServiceSelector not found!'
        );


    }

    public function testIfThatTestIsRunning2() {

    }



    //TODO: test connection
    //TODO: test request

    //TODO: test request assign
    //TODO: test request transform

    //TODO: test dto compatibility

    //TODO: test error handling
        //wrong service
        //no response
        //wrong response statuscode
        //wrong response structure
        //
}
