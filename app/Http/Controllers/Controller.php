<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Fou



ndation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\R






outing\Controller as BaseController;

class Contro

ller extends BaseCon


troller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
