<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Validatsiya extends Model
{
    protected $table = 'validatsiyas';
    protected $guarded = []; 
    public const STORAGE_URL = '/validatsiya/photo';

    public static function upload($uploadFile){
        $filename = time().$uploadFile->getClientOriginalName();
        Storage::disk('local')->putFileAs(
            self::STORAGE_URL,
            $uploadFile,
            $filename
        );
        return $filename;
    }

    public static function getAll(){
    	return self::select('*')->get();
    }

    public static function getOne($id)
    {
    	return self::select('*')->find($id);
    }

    public static function search($search)
    {
        $certificate = Validatsiya::select('*')
        ->where('fullname', 'like', '%'.$search.'%')
        ->orWhere('certNumber', 'like', '%'.$search.'%')
        ->orWhere('enteringNumber', 'like', '%'.$search.'%')
        ->orWhere('exitingNumber', 'like', '%'.$search.'%')
        ->get();
        return $certificate;
    }
}
