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

        if($response->code != 200) {
            throw new \Exception("Requested Service responded with status code $response->code");
            return array();
        }
        else {
            return $response->body;
        }
    }
}