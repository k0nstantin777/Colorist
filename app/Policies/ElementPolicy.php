<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ElementPolicy extends MainPolicy
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

    public function create()
    {
        return $this->checkPrive('element_create');
    }

    public function update()
    {
        return $this->checkPrive('element_update');
    }

    public function delete()
    {
        return $this->checkPrive('element_delete');
    }
}
