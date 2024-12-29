<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
  use HasFactory;

  protected $table = 'provinces';
  protected $fillable = ['name', 'alt_name', 'latitude', 'longitude'];

  public function regencies()
  {
    return $this->hasMany(Regency::class, "province_id");
  }
}
