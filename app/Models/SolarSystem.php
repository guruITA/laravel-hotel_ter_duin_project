<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Planet;

class SolarSystem extends Model
{
    use HasFactory;
    protected $table = 'solar_systems';
    public $timestamps = false;

    public function planets()
    {
        return $this->hasMany(Planet::class);
    }
}
