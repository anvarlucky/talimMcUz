<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public static function getAll()
    {
        return College::select('*')->get();
    }

    public static function getOne($id)
    {
        return self::select('*')->find($id);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function director()
    {
        return $this->hasOne('App\User','id', 'director_id');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
