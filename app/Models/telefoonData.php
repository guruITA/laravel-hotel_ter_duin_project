<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class telefoonData extends Model
{
    use HasFactory;

    protected $table = 'telefoon_tekoop';
    public $timestamps = false;
}
