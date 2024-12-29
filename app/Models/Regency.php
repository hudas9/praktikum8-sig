<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regency extends Model
{
  use HasFactory;

  protected $table = 'regencies';
  protected $fillable = ['province_id', 'name', 'alt_name', 'latitude', 'longitude'];

  public function province()
  {
    return $this->belongsTo(Province::class, "province_id");
  }
}
