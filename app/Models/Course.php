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
        return self::select('*')->where('type',null)->get();
    }

    public static function getMalaka(){
        return self::select('*')->where('type',2)->get();
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
