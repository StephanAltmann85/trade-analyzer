<?php

namespace App\Services\HitBTC;

use App\Components\RestRequest;
use Unirest;
use App\Services\BaseConnectionService;

/**
 * Class ConnectionService
 * @package App\Services\HitBTC
 */
class ConnectionService extends BaseConnectionService
{

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

        return RestRequest::get($url, $headers, $query)->body;
    }
}