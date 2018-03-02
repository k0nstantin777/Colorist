<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy extends MainPolicy
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

    public function index()
    {
        return $this->checkPrive('message_index');
    }

    public function show()
    {
        return $this->checkPrive('message_show');
    }

    public function delete()
    {
        return $this->checkPrive('message_delete');
    }
}
