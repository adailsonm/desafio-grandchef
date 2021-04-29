<?php 
namespace App\Facades;

use Illuminate\Support\Facades\Http;

class Genero
{
    private static $apiKey = "91a8db6aa653300a6c61c6942e1d63b6";
    private static $baseUri = "https://v2.namsor.com/NamSorAPIv2/api2/json/";

    public static function genderFull(string $name)
    {
        $headers = [
            "X-API-KEY" => self::$apiKey
        ];

        $response = Http::withHeaders(
            $headers
        )->get(self::$baseUri . "genderFull/" . $name);

        return $response->json()['likelyGender'];
    }
}