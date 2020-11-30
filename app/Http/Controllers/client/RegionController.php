<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\District;

class RegionController extends Controller
{
    public function getAllRegions()
    {
        $regions = Region::find(10);
        //$districts = District::getAll();
        //dump($regions->districts);
        foreach($regions as $region)
        {
            dump($region->name);
        }
    }

    public function storeRegion(Request $request)
    {
        $region = new Region;
        $region->name = 'Test';
        $region->save();
    }

    public function deleteRegion($id)
    {
        $region = Region::destroy()->where($id,15);
        if($region==1)
        {
            return "success";
        }
        return "not success";
    }
}
