<?php

namespace Thegiant\ExRoute;

class ExRoute
{
    static function post($uri, $body, $headers = ['Content-Type: application/json', 'Accept: application/json'])
    {
        return CurlRequest::post($uri, $body, $headers);
    }

    static function get($uri, $body, $headers = ['Content-Type: application/json', 'Accept: application/json'])
    {
        return CurlRequest::get($uri, $body, $headers);
    }

    static function request($uri, $body, $method = 'POST', $headers = ['Content-Type: application/json', 'Accept: application/json'])
    {
        return strtoupper($method) == 'POST' ? self::post($uri, $body, $headers) : self::get($uri, $body, $headers);
    }
}
