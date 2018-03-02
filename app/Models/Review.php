<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    //Many to One
    public function block()
    {
        return $this->belongsTo('App\Models\Block');
    }
        
}
