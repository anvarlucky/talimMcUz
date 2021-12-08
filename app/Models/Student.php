<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public const STORAGE_URL = '/validation/photo';
    public const STORAGE_CERT = '/validation/certificate';
    public const STORAGE_ORDER = '/validation/order';

    public static function uploadPhoto($uploadFile){
        $filename = time().$uploadFile->getClientOriginalName();
        Storage::disk('local')->putFileAs(
            self::STORAGE_URL,
            $uploadFile,
            $filename
        );
        return $filename;
    }

    public static function uploadCertificate($uploadFile){
        $filename = time().$uploadFile->getClientOriginalName();
        Storage::disk('local')->putFileAs(
            self::STORAGE_CERT,
            $uploadFile,
            $filename
        );
        return $filename;
    }

    public static function uploadOrder($uploadFile){
        $filename = time().$uploadFile->getClientOriginalName();
        Storage::disk('local')->putFileAs(
            self::STORAGE_ORDER,
            $uploadFile,
            $filename
        );
        return $filename;
    }

    public static function getAll()
    {
        return self::select('*')->where('status', 1)->simplePaginate(1);
    }

    public static function getAllCertified()
    {
        return self::select('*')->where('status', 2)->get();
    }

    public static function getOne($id)
    {
        return self::select('*')->find($id);
    }

    public function college()
    {
        return $this->belongsTo('App\Models\College');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public static function search($search)
    {
        $certificate = Student::select('*')
            ->where('f_name', 'like', '%'.$search.'%')
            ->orWhere('s_name', 'like', '%'.$search.'%')
            ->orWhere('certificate_number', 'like', '%'.$search.'%')
            ->orWhere('entering_number', 'like', '%'.$search.'%')
            ->orWhere('finishing_number', 'like', '%'.$search.'%')
            ->get();
        return $certificate;
    }
}
