<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy extends MainPolicy
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
        return $this->checkPrive('review_create');
    }

    public function update()
    {
        return $this->checkPrive('review_update');
    }

    public function delete()
    {
        return $this->checkPrive('review_delete');
    }

    public function index()
    {
        return $this->checkPrive('review_index');
    }
}
