<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class EarthquakeController extends Controller
{
  public function index()
  {
    $response = Http::get('https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.json');
    $earthquakes = $response->json()['Infogempa']['gempa'];

    return view('map.earthquake', compact('earthquakes'));
  }
}
