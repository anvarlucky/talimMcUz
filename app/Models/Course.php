<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public static function getAll()
    {
        return self::select('*')->get();
    }

    public static function getOne($id)
    {
        return self::select('*')->find($id);
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
