<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegRequest;
use App\Models\Reg;
use App\Models\Dis;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function index()
    {
        $regions = Reg::select('*','name->uz as name_uz')->get();
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $regions,
            'status' => 200
        ])->withHeaders($this->headers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegRequest $request)
    {
        $region = Reg::create($request->all());
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $region,
            'status'=> 201
        ])->withHeaders($this->headers);
    }

    public function dis($reg_id)
    {
        $district = Dis::select('*')->where('region_id', $reg_id)->get();
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $district,
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Reg::select('*')->where('id', $id)->get();
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $region,
            'status' => 200
        ])->withHeaders($this->headers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function regName($id)
    {
        $region = Reg::select('id','name')->where('id', $id)->get();
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $region,
            'status' => 200
        ])->withHeaders($this->headers);
    }
}
