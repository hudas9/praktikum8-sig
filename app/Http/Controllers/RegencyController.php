<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;

class RegencyController extends Controller
{
  public function showRegencies()
  {
    $regencies = Regency::all();
    return view('map.regency', ['regencies' => $regencies]);
  }
}
