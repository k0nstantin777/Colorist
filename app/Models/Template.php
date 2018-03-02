<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function scopeBlock($query)
    {
        return $query->where('type', 'blocks');    
    }
    
    public function scopeElements($query)
    {
        return $query->where('type', 'elements');    
    }
            
    public function blocks()
    {
        return $this->hasMany('App\Models\Block');
    }
    
    public function elements()
    {
        return $this->hasMany('App\Models\Element');
    }
}
