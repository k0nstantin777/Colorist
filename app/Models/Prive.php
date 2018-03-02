<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prive extends Model
{
    protected $guarded = ['id'];
    
    /**
     * The roles that belong to the prives.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
