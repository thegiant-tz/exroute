<?php 
namespace Thegiant\ExRoute;

class ExRoute {
    static function post($uri, $data, $page = 1, $headers = ['Content-Type: application/json', 'Accept: application/json'], $baseUrl = '')
    {
        return CurlRequest::post(Route::apiRoute($uri, $page, $baseUrl), $data, $headers);
    }

    static function get($uri, $data, $page = 1, $headers = ['Content-Type: application/json', 'Accept: application/json'], $baseUrl = '')
    {
        return CurlRequest::get(Route::apiRoute($uri, $page, $baseUrl), $data, $headers);
    }
}