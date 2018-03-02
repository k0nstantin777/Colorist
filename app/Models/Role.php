<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];
    
    /**
     * The prives that belong to the roles.
     */
    public function prives()
    {
        return $this->belongsToMany('App\Models\Prive');
    }
    
    /**
     * Get the user for the role.
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
       
}
