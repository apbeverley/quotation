<?php

namespace App\Resources;

trait Postcodes
{
    private static function parse($postcode)
    {
        // parse the postcode and return the result
        preg_match('/^\s*(([A-Z]{1,2})[0-9][0-9A-Z]?)\s*(([0-9])[A-Z]{2})\s*$/', strtoupper($postcode), $matches);

        return $matches;
    }

    public static function getArea($postcode)
    {
        $parts = self::parse($postcode);

        return (count($parts) > 0 ? $parts[2] : false);
    }

    public static function getDistrict($postcode)
    {
        $parts = self::parse($postcode);
        return (count($parts) > 0 ? $parts[1] : false);
    }
}