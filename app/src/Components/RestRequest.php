<?php
/**
 * Created by PhpStorm.
 * User: salty
 * Date: 21.05.18
 * Time: 21:55
 */

namespace App\Components;

use Unirest\Request;

class RestRequest extends Request
{
    /**
     * Send a GET request to a URL
     *
     * @param string $url URL to send the GET request to
     * @param array $headers additional headers to send
     * @param mixed $parameters parameters to send in the querystring
     * @param string $username Authentication username (deprecated)
     * @param string $password Authentication password (deprecated)
     * @return Response
     */
    public static function get($url, $headers = array(), $parameters = null, $username = null, $password = null) {
        $response = parent::get($url, $headers, $parameters, $username, $password);

        if($response->code != 200) {
            throw new \Exception("Requested Service responded with status code $response->code");
            //TODO: implement logger (url, time, status code) - monolog
        }


        return $response;
    }
}