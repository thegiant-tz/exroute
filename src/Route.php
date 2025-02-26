<?php 
namespace Thegiant\ExRoute;

class Route {
    static function apiRoute($endpoint, $page = 1) {
        return env('API_BASE_URL'). $endpoint . "?page=" . $page;
    }
}