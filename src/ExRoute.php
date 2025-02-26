<?php 
namespace Thegiant\ExRoute;

class ExRoute {
    static function post($uri, $data, $page = 1, $headers = ['Content-Type: application/json', 'Accept: application/json']) {
        return CurlRequest::post(Route::apiRoute($uri, $page), $data, $headers);
    }

    static function get($uri, $data, $page = 1, $headers = ['Content-Type: application/json', 'Accept: application/json']) {
        return CurlRequest::get(Route::apiRoute($uri, $page), $data, $headers);
    }
}