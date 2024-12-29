<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
  public function showProvinces()
  {
    $provinces = Province::all();
    return view('map.province', ['provinces' => $provinces]);
  }
}
