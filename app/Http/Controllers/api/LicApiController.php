<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LicenceTestRequest;
use App\Models\Licence;
use App\Models\Project;
use Illuminate\Http\Request;
use Validator;

class LicApiController extends Controller
{
    protected $headers;
    protected const CODE_VALIDATION_ERROR = 422;
    protected const CODE_SUCCESS_UPDATED = 202;
    protected const CODE_SUCCESS_CREATED = 201;
    protected const CODE_SUCCESS_DELETED = 202;
    protected const CODE_SUCCESS_FALSE = 555;
    protected const CODE_ACCESS_DENIED = 403;

    public function __construct(){
        $this->headers = [
            'Access-Control-Allow-Origin' => '*',
            'Content-Type' => 'application/json'
        ];
    }
    public function licence(Request $request){
        $licence = new Licence();
        $licence->send_id = $request->send_id;
        $licence->send_date = $request->send_date;
        $licence->license_name = $request->license_name;
        $licence->address = $request->address;
        $licence->phone_number = $request->phone_number;
        $licence->account_number = $request->account_number;
        $licence->e_adress = $request->e_adress;
        $licence->tin = $request->tin;
        $licence->pinfl = $request->pinfl;
        $licence->fio_director = $request->fio_director;
        $licence->license_number = $request->license_number;
        $licence->license_date = $request->license_date;
        $licence->license_term = $request->license_term;
        $licence->type_of_activity = $request->type_of_activity;
        $licence->license_edit_asosDate = $request->license_edit_asosDate;
        $licence->license_end_asosDate = $request->license_end_asosDate;
        $licence->save();
        return $licence;



        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $licence,
            'status'=> 201
        ])->withHeaders($this->headers);
    }

    public function licence381(Request $request){
        $project = new Project();
        $project->send_id = $request->send_id;
        $project->send_date = $request->send_date;
        $project->license_name = $request->license_name;
        $project->address = $request->address;
        $project->phone_number = $request->phone_number;
        $project->account_number = $request->account_number;
        $project->e_adress = $request->e_adress;
        $project->tin = $request->tin;
        $project->pinfl = $request->pinfl;
        $project->fio_director = $request->fio_director;
        $project->license_number = $request->license_number;
        $project->license_date = $request->license_date;
        $project->complexity_category = $request->complexity_category;
        $project->type_of_activity = $request->type_of_activity;
        $project->license_edit_asosDate = $request->license_edit_asosDate;
        $project->license_end_asosDate = $request->license_end_asosDate;
        $project->save();
        return $project;



        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $project,
            'status'=> 201
        ])->withHeaders($this->headers);
    }
}
