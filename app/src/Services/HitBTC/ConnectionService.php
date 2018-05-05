<?php

namespace App\Services\HitBTC;

use App\Services\ConnectionServiceInterface;
use Unirest;

/**
 * Class ConnectionService
 * @package App\Services\HitBTC
 */
class ConnectionService implements ConnectionServiceInterface {

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

    /**
     * @param array $params
     * @return Unirest\Response
     */
    public function get(array $params) {
        $url = $this->serviceBaseUrl . $params['endpoint'] . '/' . $params['symbol'];
        $data = $params['data'];

        $headers = array('Accept' => 'application/json');
        $body = Unirest\Request\Body::form($data);

        return Unirest\Request::get($url, $headers, $body);
    }
}