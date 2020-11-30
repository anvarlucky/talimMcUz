<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{

    public function getAllColleges()
    {
        $colleges = College::getAll();
        dd($colleges->district->name);

    }
}
