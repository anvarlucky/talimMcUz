<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    public function getAllDistricts()
    {
        $districts = District::getAll();
        foreach($districts as $district)
        {
            dump($district->name);
            dump($district->region->name);
        }
    }
}
