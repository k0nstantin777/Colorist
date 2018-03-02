<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy extends MainPolicy
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
        return $this->checkPrive('page_create');
    }

    public function update()
    {
        return $this->checkPrive('page_update');
    }

    public function delete()
    {
        return $this->checkPrive('page_delete');
    }

    public function index()
    {
        return $this->checkPrive('page_index');
    }
}
