<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;

class CertifiedStudentController extends Controller
{
    protected $headers;
    public function __construct()
    {
        $this->headers =[
            'Accept' => 'application/json',
            'Language' => app()->getLocale(),
        ];
    }

    public function index($pnfl=null)
    {
        $students = Student::select('id','f_name','s_name','l_name','address','certificate_number','pnfl','status')->where('pnfl',$pnfl)->where('status',2)
            ->get();
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $students,
            'status' => 200
        ])->withHeaders($this->headers);
    }
}
