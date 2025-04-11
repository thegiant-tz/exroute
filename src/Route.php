<?php 
namespace Thegiant\ExRoute;

class Route {
    static function apiRoute($endpoint, $page = 1, $baseUrl = null)
    {
        return (is_null($baseUrl) ? env('EX_BASE_URL') : $baseUrl) . $endpoint . "?page=" . $page;
    }
}