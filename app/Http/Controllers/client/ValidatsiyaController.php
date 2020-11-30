<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Validatsiya;
use App\Http\Requests\ValidatsiyaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ValidatsiyaController extends Controller
{
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index() {
        /*dd(session());*/
/*        $user = Auth::user();
        if(!Auth::check())
        {
         Auth::guard('web')->login($user);
            //   return redirect('/login');
        }*/
    	$validatsiya = Validatsiya::getAll();
/*    	dd($validatsiya);
    	if($validatsiya->status==1)
    	{
    		$validatsiya->status='dsasd';
    	}*/
    	return view('validatsiya.index',[
    		'validatsiyas' => $validatsiya,
    	]);
    }

    public function create() {
/*        Auth::user();
        if(!Auth::check())
        {
            return redirect('/login');
        }*/
    	return view('validatsiya.create');
    }

    public function store(ValidatsiyaRequest $request)
    {
    	$requestAll = $request->except('_token');
        if($request->hasFile('photo')) {
            $uploadFile = $request->file('photo');
            $fileName = Validatsiya::upload($uploadFile);
            $requestAll['photo'] = $fileName;
        }
        if($request->hasFile('certPhoto'))
        {
            $uploadFile = $request->file('certPhoto');
            $fileName = Validatsiya::upload($uploadFile);
            $requestAll['certPhoto'] = $fileName;
        }
/*        $validatsiya = new Validatsiya;
		$validatsiya->fullname = $request->fullname;
		$validatsiya->birthday = $request->birthday;
		$validatsiya->address = $request->address;
		$validatsiya->course = $request->course;
		$validatsiya->courseRegion = $request->courseRegion;
		$validatsiya->courseDistrict = $request->courseDistrict;
		$validatsiya->enteringNumber = $request->enteringNumber;
		$validatsiya->startDay = $request->startDay;
		$validatsiya->exitingNumber = $request->exitingNumber;
		$validatsiya->endDay = $request->endDay;
		$validatsiya->certNumber = $request->certNumber;
		$validatsiya->certDate = $request->certDate;
		$validatsiya->college = $request->college;
		$validatsiya->status = $request->status;
		$validatsiya->photo = $request->photo;
		$validatsiya->certPhoto = $request->certPhoto;
		$validatsiya->save();*/
        $validatsiya = Validatsiya::create($requestAll);
		if ($validatsiya==true) {
			return redirect()->route('validatsiya.index');
		}
        
    }

    public function search(Request $request)
    {
        $search = $request->post('search');
        $certificate = Validatsiya::search($search);
    	return view('validatsiya.index', [
    		'validatsiyas' => $certificate
    	]);
    }

    public function edit($id)
    {
    	$validatsiya = Validatsiya::getOne($id);
    	return view('validatsiya.edit', [
    		'validatsiya' => $validatsiya,
    	]);
    }

    public function update(ValidatsiyaRequest $request, $id)
    {
        $validatsiya = Validatsiya::find($id);
        $requestAll = $request->except('_token');
        if($request->hasFile('photo')) {
            $uploadFile = $request->file('photo');
            $fileName = Validatsiya::upload($uploadFile);
            $requestAll['photo'] = $fileName;
        }
        if($request->hasFile('certPhoto'))
        {
            $uploadFile = $request->file('certPhoto');
            $fileName = Validatsiya::upload($uploadFile);
            $requestAll['certPhoto'] = $fileName;
        }
		$validatsiya->fullname = $requestAll['fullname'];
		$validatsiya->birthday = $requestAll['birthday'];
		$validatsiya->address = $requestAll['address'];
		$validatsiya->course = $requestAll['course'];
		$validatsiya->courseRegion = $requestAll['courseRegion'];
		$validatsiya->courseDistrict = $requestAll['courseDistrict'];
		$validatsiya->enteringNumber = $requestAll['enteringNumber'];
		$validatsiya->startDay = $requestAll['startDay'];
		$validatsiya->exitingNumber = $requestAll['exitingNumber'];
		$validatsiya->endDay = $requestAll['endDay'];
		$validatsiya->certNumber = $requestAll['certNumber'];
		$validatsiya->certDate = $requestAll['certDate'];
		$validatsiya->college = $requestAll['college'];
		$validatsiya->status = $requestAll['status'];
		$validatsiya->photo = $requestAll['photo'];
		$validatsiya->certPhoto = $requestAll['certPhoto'];
		$validatsiya->save();

		if ($validatsiya==true) {
			return redirect()->route('validatsiya.index');
		}
    }


}
