<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\User;
use App\Models\District;
use App\Models\Student;
use App\Http\Requests\CollegeRequest;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::getAll();
        return view('admin.colleges.index',
            [
                'colleges' => $colleges
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::getAll();
        $users = User::select('*')->where('role','Hodim')->get();
        $directors = User::select('*')->where('role','Direktor')->get();
        return view('admin.colleges.create',[
            'districts' => $districts,
            'users' => $users,
            'directors' => $directors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollegeRequest $request)
    {
        $request = $request->except('_token');
        $college = College::create($request);
        if($college == true)
            return redirect()->route('colleges.index');
        else
            return redirect()->back()->withErrors();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentsFinished = Student::where(['college_id' => $id, 'status' => 2])->count();
        $studentsStudy = Student::where(['college_id' => $id, 'status' => 1])->count();
        $studentsOut = Student::where(['college_id' => $id, 'status' => 3])->count();
        $students = Student::where('college_id', $id)->count();
        return view('admin.colleges.show', [
            'studentsFinished' => $studentsFinished,
            'studentsStudy' => $studentsStudy,
            'studentsOut' => $studentsOut,
            'students' => $students
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $districts = District::getAll();
        $users = User::select('*')->where('role','Hodim')->get();
        $directors = User::select('*')->where('role','Direktor')->get();
        $college = College::getOne($id);
        return view('admin.colleges.edit', [
            'districts' => $districts,
            'users' => $users,
            'directors' => $directors,
            'college' => $college
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $college = College::getOne($id);
        $college->name = $request->name;
        $college->district_id = $request->district_id;
        $college->user_id = $request->user_id;
        $college->director_id = $request->director_id;
        $college->code = $request->code;
        $college->save();
        if($college == true)
        {
            return redirect()->route('colleges.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::destroy($id);
        if($college == true)
        {
            return redirect()->route('colleges.index');
        }
    }
}
