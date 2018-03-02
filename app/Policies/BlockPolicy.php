<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlockPolicy extends MainPolicy
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
        return $this->checkPrive('block_create');
    }

    public function update()
    {
        return $this->checkPrive('block_update');
    }

    public function delete()
    {
        return $this->checkPrive('block_delete');
    }

}
