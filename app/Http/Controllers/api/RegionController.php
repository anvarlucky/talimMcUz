<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\District;

class RegionController extends Controller
{
    protected $headers;
    public function __construct(){
        $this->headers =[
        'Accept' => 'application/json',
        'Language' => app()->getLocale(),
        ];
    }
    public function all()
    {
        $regions = Region::select('id','name')->get();
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $regions
        ])->withHeaders($this->headers);
    }

    public function district($regionId)
    {
        $districts = District::select('id','name','region_id')->where('region_id',$regionId)->get();
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
            'data' => $districts
        ])->withHeaders($this->headers);
    }
}
