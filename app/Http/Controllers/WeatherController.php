<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use CityHelper; // No namespace import needed for the helper file

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $weatherResponse = [];

        if ($request->isMethod("post")) {
            $cityName = $request->city;
            $response = Http::withHeaders([
                "X-RapidAPI-Host" => "open-weather13.p.rapidapi.com",
                "X-RapidAPI-Key" => "b7ba909794mshc2fe5c2578947b6p193717jsn7c634c7ff065"
            ])->get("https://open-weather13.p.rapidapi.com/city/{$cityName}/EN");
            $weatherResponse = $response->json();
        }

        $cities = getIndianCities(); // Calling the helper function directly

        return view("weather", [
            "data" => $weatherResponse,
            "cities" => $cities 
        ]);
    }
}
