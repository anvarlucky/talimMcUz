<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'regions';

    public static function getAll()
    {
        return Region::select('*')->get();
    }

    public static function getOne($id)
    {
        return self::select('*')->find($id);
    }

    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }
}
