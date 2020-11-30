<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public static function getAll()
    {
        return District::select('*')->get();
    }

    public static function getOne($id)
    {
        return self::select('*')->find($id);
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function colleges()
    {
        return $this->hasMany('App\Models\College');
    }
}
