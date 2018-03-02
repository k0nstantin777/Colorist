<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class MainPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    protected function checkPrive($prive)
    {
        $prives = Auth::user()->role->prives()->pluck('name');

        $allowed = $prives->filter(function($item) use ($prive){
            return $item === $prive || $item === 'superuser';
        });

        return $allowed->isNotEmpty();
    }

}
