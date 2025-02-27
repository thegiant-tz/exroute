<?php

namespace Thegiant\ExRoute;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginator
{
    static function fromArray(array $arrayResponse)
    {
        
        if (!is_null($arrayResponse)) {
            $items = $arrayResponse['data'];
            $currentPage = $arrayResponse['meta']['current_page'];
            $perPage = $arrayResponse['meta']['per_page'];
            $totalItems = $arrayResponse['meta']['total'];
            $url = $arrayResponse['meta']['path'];
            return new LengthAwarePaginator($items, $totalItems, $perPage, $currentPage, ['path' => $url]);
        }
        return [];
    }

    static function fromJson($jsonResponse, $url = null)
    {
        if (!is_null($jsonResponse)) {
            $items = $jsonResponse->data;
            $currentPage = $jsonResponse->meta->current_page ?? 1;
            $perPage = $jsonResponse->meta->per_page ?? 1;
            $totalItems = $jsonResponse->meta->total ?? 1;
            return new LengthAwarePaginator($items, $totalItems, $perPage, $currentPage, ['path' => $url]);
        }
        return [];
    }
}
