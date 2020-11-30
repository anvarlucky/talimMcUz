<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\College;
use Carbon\Carbon;
use App\Models\Region;
use App\Models\District;
use App\Models\Course;
use chillerlan\QRCode\QRCode;
use Gate;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if(Auth::user()) {
            $user_id = Auth::user()->id;
            if($user_id == 1)
            {
                $colAuth =1;
            }
            if(Auth::user()->role == 'Admin')
            {
                return redirect('/admin');
            }
            $college_auth = (College::where(['user_id' => $user_id])->get());
            foreach ($college_auth as $colAuth) {
                    $colAuth = $colAuth->id;
            }

                $students = Student::select('*')->where(['college_id' => $colAuth, 'status' => 1])->paginate(10);
            //dd($students);
                return view('students.index', [
                    'students' => $students
                ]);
        }
    }

    public function indexCertified()
    {
        if(Auth::user()) {
            $user_id = Auth::user()->id;
            if($user_id == 1)
            {
                $colAuth =1;
            }
            if(Auth::user()->role == 'Admin')
            {
                return redirect('/admin');
            }
            $college_auth = (College::where(['user_id' => $user_id])->get());
            foreach ($college_auth as $colAuth) {
                $colAuth = $colAuth->id;
            }
            $students = Student::select('*')->where(['college_id' => $colAuth, 'status' => 2])->paginate(10);
            return view('students.indexCertified', [
                'students' => $students
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges = College::getAll();
        $courses = Course::getAll();
        return view('students.create',
            [
             'colleges' => $colleges,
                'courses' => $courses
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {

        $student = new Student;
        if(Gate::denies('create', $student)){
            return redirect()->back()->with(['message' => 'Сизда ушбу профил орқали қўшиш имкони йўқ!']);
        }

        $requestAll = $request->except('_token');
        if($request->hasFile('photo')) {
            $uploadFile = $request->file('photo');
            $fileName = Student::uploadPhoto($uploadFile);
            $requestAll['photo'] = $fileName;
        }
        if($request->hasFile('order_photo'))
        {
            $uploadFile = $request->file('order_photo');
            $fileName = Student::uploadOrder($uploadFile);
            $requestAll['order_photo'] = $fileName;
        }
        $student = Student::create($requestAll);
        if ($student==true) {
            return redirect()->route('students.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->post('search');
        $college = Auth::user()->college->id;
        $certificate = Student::search($search)->where('college_id',$college);
        return view('students.index', [
            'students' => $certificate
        ]);
    }

    public function certificate($id)
    {
        $student = Student::select('id','certificate_photo')->where('id', $id)->first();
        return response()->download(public_path('/storage/validation/certificate/'.$student->certificate_photo));
    }

    public function order($id)
    {
        $student = Student::select('id','order_photo')->where('id', $id)->first();
        return response()->download(public_path('/storage/validation/order/'.$student->order_photo));
    }

    public function show($id)
    {
        $student = Student::getOne($id);
        $qrCode = (new QRCode)->render(route('student', $id));
        return view('students.show', [
           'student' => $student,
           'qrCode' => $qrCode,
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
        $student = Student::getOne($id);
        if($student->status==2)
        {
            return redirect()->route('certified');
        }
        $courses = Course::getAll();
        $colleges = College::getAll();
        return view('students.edit',[
            'student' => $student,
            'courses' => $courses,
            'colleges' => $colleges
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
        $requestAll = $request->except('_token');
        if($request->hasFile('certificate_photo'))
        {
            $uploadFile = $request->file('certificate_photo');
            $fileName = Student::uploadCertificate($uploadFile);
            $requestAll['certificate_photo'] = $fileName;
        }
        $request->validate([
            'certificate_photo'=>'required',
            'status'=>'required',
            'finishing_number'=>'required|unique:students,finishing_number',
            'finishing_data'=>'required',
            'certificate_number'=>'required|unique:students,certificate_number',
            'certificate_date'=>'required',
            'certificate_photo' => 'required|mimes:jpeg,png,jpg,pdf|max:5120'
        ]);
        $student = Student::getOne($id);
        if(Gate::allows('update', $student))
        {
        $student->s_name = $request->s_name;
        $student->f_name = $request->f_name;
        $student->l_name = $request->l_name;
        $student->birthday = $request->birthday;
        $student->address = $request->address;
        $student->course_id = $request->course_id;
        $student->entering_number = $request->entering_number;
        $student->entering_date = $request->entering_date;
        $student->college_id = $request->college_id;
        $student->photo = $student->photo;
        $student->order_photo = $student->order_photo;
        $student->status = $request->status;
        $student->finishing_number = $request->finishing_number;
        $student->finishing_data = $request->finishing_data;
        $student->certificate_number = $request->certificate_number;
        $student->certificate_date = $request->certificate_date;
        $student->certificate_photo = $requestAll['certificate_photo'];
        $student->save();
            return redirect()->route('certified')->with('message', 'Сертификат берилди!');
        }
        return redirect()->back()->with('message', 'Сизда Сертификатни юклаш учун рухсат йўқ!');
        if($student == true)
        {
            return redirect()->route('certified');
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
        //
    }
}
