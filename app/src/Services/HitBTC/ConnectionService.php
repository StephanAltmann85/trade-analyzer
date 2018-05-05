<?php

namespace App\Services\HitBTC;

use App\Services\ConnectionServiceInterface;
use Unirest;

class ConnectionService implements ConnectionServiceInterface {

    public $serviceBaseUrl;

    public function __construct(string $serviceBaseUrl) {
        $this->serviceBaseUrl = $serviceBaseUrl;
    }

    public function get(array $params) {
        $url = $this->serviceBaseUrl . $params['endpoint'] . '/' . $params['symbol'];

        $headers = array('Accept' => 'application/json');

        $data = $params['data'];

        $body = Unirest\Request\Body::form($data);

        $response = Unirest\Request::get($url, $headers, $body);

        return $response;
    }



}