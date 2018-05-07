<?php

namespace App\Services\Test;

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
     * @return Unirest\Response
     */
    public function get(array $params) {
        //TODO: return sample response
    }
}