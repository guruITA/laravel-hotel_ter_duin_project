<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SolarSystem;

class Planet extends Model
{
    use HasFactory;
    protected $table = 'planeten';
    public $timestamps = false;

    public function solar_system()
    {
        return $this->belongsTo(SolarSystem::class);
    }
}
