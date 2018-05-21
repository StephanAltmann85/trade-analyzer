<?php

namespace App\Services\HitBTC;

use App\Services\ConnectionServiceInterface;
use Unirest;
use App\Services\BaseConnectionService;

/**
 * Class ConnectionService
 * @package App\Services\HitBTC
 */
class ConnectionService extends BaseConnectionService implements ConnectionServiceInterface {

    /**
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function get(array $params) : array {
        $url = $this->serviceBaseUrl . $params['endpoint'] . '/' . $params['symbol'];
        $query = $params['query'];

        $headers = array('Accept' => 'application/json');
        Unirest\Request::jsonOpts(true);

        $response = Unirest\Request::get($url, $headers, $query);

        //TODO: implement wrapper for throwing exception if status code is not 200
        //TODO: implement logger (url, time, status code) - monolog

        if($response->code != 200) {
            throw new \Exception("Requested Service responded with status code $response->code");
            return array();
        }
        else {
            return $response->body;
        }
    }
}