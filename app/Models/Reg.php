<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Reg extends Model
{
    use SoftDeletes;
    protected $guarded =[];
    protected $table ='regions_for_all';

    public static function boot()
    {
        parent::boot();
        self::saving(function ($model) {
            $model->name = json_encode($model->name);
        });
    }
    public function districts()
    {
        return $this->hasMany('App\Models\Dis');
    }
}
