<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Student;

class CollegeController extends Controller
{
    public function index(){
        $colleges = College::getAll();
        return view('director.colleges.index',
            [
                'colleges' => $colleges
            ]);
    }

    public function show($id)
    {
        $studentsFinished = Student::where(['college_id' => $id, 'status' => 2])->count();
        $studentsStudy = Student::where(['college_id' => $id, 'status' => 1])->count();
        $studentsOut = Student::where(['college_id' => $id, 'status' => 3])->count();
        $students = Student::where('college_id', $id)->count();
        return view('director.colleges.show', [
            'studentsFinished' => $studentsFinished,
            'studentsStudy' => $studentsStudy,
            'studentsOut' => $studentsOut,
            'students' => $students
        ]);
    }
}
