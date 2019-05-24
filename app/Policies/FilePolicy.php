<?php

namespace App\Policies;

use App\User;
use App\Archivo;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function touch(User $user, Archivo $file)
    {
        return $file->user_id == $user->id;
    }
}
