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
     */
    public function get(array $params) {
        $url = $this->serviceBaseUrl . $params['endpoint'] . '/' . $params['symbol'];
        $query = $params['query'];

        $headers = array('Accept' => 'application/json');
        Unirest\Request::jsonOpts(true);

        return Unirest\Request::get($url, $headers, $query)->body;
    }
}