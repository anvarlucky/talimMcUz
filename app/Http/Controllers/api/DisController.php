<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dis;
use App\Models\Reg;

class DisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $headers;
    public function __construct()
    {
        $this->headers =[
            'Accept' => 'application/json',
            'Language' => app()->getLocale(),
        ];
    }

    public function index()
    {
        $districts = Dis::select('*','name->uz as name_uz')->get();
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $districts,
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
    public function store(Request $request)
    {
        $district = Dis::create($request->all());
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $district,
            'status' => 201
        ])->withHeaders($this->headers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $district = Dis::select('id','name', 'region_id')->where('id', $id)->get();
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => [
                $district,
                ],
            'status' => 200
        ])->withHeaders($this->headers);
    }

    public function getWithRegion($id)
    {
        return Dis::select('r.name as region', 'districts_for_all.name as district','districts_for_all.id as district_id')
            ->where('districts_for_all.id', $id)
            ->leftJoin('regions_for_all as r', 'r.id', 'region_id')
            ->firstOrFail();
    }



}
