<?php

namespace App\Tests\Services\Test;

use App\Services\ConnectionServiceInterface;
use Unirest;
use Unirest\Request;
use Unirest\Response;
use App\Services\BaseConnectionService;

/**
 * Class ConnectionService
 * @package App\Services\Test
 */
class ConnectionService extends BaseConnectionService implements ConnectionServiceInterface {

    /**
     * @param array $params
     * @return array
     */
    public function get(array $params) : array {

        $response = new Response(200, '{
          "ask": {
            "price": "0.012285",
            "size": "6.754"
          },
          "bid": {
            "price": "0.012106",
            "size": "43.167"
          },
          "timestamp": "2018-05-21T18:04:11.946Z"
        }', '');

        return json_decode($response->raw_body, true);
    }
}