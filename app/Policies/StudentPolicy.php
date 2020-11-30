<?php

namespace App\Policies;

use App\User;
use \Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        $request = Request::capture()->college_id;
        if($user->role == 'Hodim' && $user->college->id==$request)
            {
                return TRUE;
            }

        return FALSE;
    }

    public function update(User $user, Student $student)
    {
            $request = Request::capture()->college_id;
            if($user->role == 'Hodim' && $user->college->id==$request)
            {
               if($user->college->id == $student->college_id)
               {
                   return TRUE;
               }
                return FALSE;
            }
        return FALSE;
    }
}
