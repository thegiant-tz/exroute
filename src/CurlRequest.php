<?php

namespace Thegiant\ExRoute;

class CurlRequest
{
    private static function curlpost($url, $data, $request = 'POST', $headers = ['Content-Type: application/json', 'Accept: application/json'], $status = false)
    {
        $authHeader = [];
        if (!$status) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $request,
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array_merge($headers, $authHeader),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        }
    }

    public static function post($uri, $data = [], $headers = ['Content-Type: application/json', 'Accept: application/json'], $status = false)
    {
        return CurlRequest::curlpost($uri, $data, 'POST', $headers, $status);
    }

    public static function get($uri, $data = [], $headers = ['Content-Type: application/json', 'Accept: application/json'])
    {
        return CurlRequest::curlpost($uri, $data, 'GET', $headers);
    }

    public static function load($url, $data = [], $request = 'GET', $return_transfer = false, $http_status = true)
    {
        if ($http_status) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, $return_transfer);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $res = curl_exec($ch);
            curl_close($ch);
            if ($return_transfer) {
                return $res;
            }
        }
    }
}
