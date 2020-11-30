<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\College;

class HomeController extends Controller
{


    public function index()
    {
        $all = Student::select('*')->get()->count();
        $allStudy = Student::select('*')->where('status',1)->count();
        $allFinish = Student::select('*')->where('status', 2)->count();
        return view('admin.home', [
            'all' => $all,
            'allStudy' => $allStudy,
            'allFinish' => $allFinish,
        ]);
    }

    public function show()
    {
        return "<a href class='{{Auth::logout()}}'>dsfsdfds</a>";
    }
}
