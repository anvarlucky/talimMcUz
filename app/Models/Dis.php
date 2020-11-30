<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Dis extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table ='districts_for_all';
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        self::saving(function ($model) {
            $model->name = json_encode($model->name);
        });
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Reg');
    }
}
