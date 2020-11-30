<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::getAll();
        return view('admin.courses.index',
            [
                'courses' => $courses
            ]);
    }

    public static function create()
    {
        return view('admin.courses.create');
    }

    public static function store(CourseRequest $request)
    {
        $request = $request->except('_token');
        $course = Course::create($request);
        if($course == true)
        {
            return redirect()->route('courses.index');
        }
    }

    public static function edit($id)
    {
        $course = Course::getOne($id);
        return view('admin.courses.edit',[
            'course' => $course
        ]);
    }

    public static function update(Request $request, $id)
    {
        $course = Course::getOne($id);
        $course->name = $request->name;
        $course->save();
        if($course== true)
        {
            return redirect()->route('courses.index');
        }
    }

    public static function destroy($id)
    {
        $course = Course::destroy($id);
        if($course == true)
        {
            return redirect()->route('courses.index');
        }
    }
}
