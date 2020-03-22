<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class VehicleLookupService
{
    public const VEHICLE_LOOKUP_API_URL = '';

    public function request(string $regNo)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => SELF::VEHICLE_LOOKUP_API_URL,
            // You can set any number of default request options.
            'timeout' => 2.0,
            // You should turn HTTP error exceptions off so that this package can handle all HTTP return codes.
            'http_errors' => false,
            // Get the response as json
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/json'
            ],
        ]);

        $response = $client->request('POST', '/vehicle-details', [
            RequestOptions::JSON => ['regNo' => $regNo]
        ]);

        $statusCode = (int)$response->getStatusCode();

        if ($statusCode === 200) {
            return $response->getBody()->getContents();
        }
    }

    public function getVehicleAbi(string $registration): string
    {
        $abiCodes = [
            '22529902',
            '46545255',
            '52123803',
            '' //failed response if no lookup was found
        ];

        return $abiCodes[array_rand($abiCodes)];
    }
}