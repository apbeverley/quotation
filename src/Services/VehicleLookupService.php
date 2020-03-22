<?php

namespace App\Services;

class VehicleLookupService
{
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