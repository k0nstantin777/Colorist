<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    //many to one
    public function block()
    {
        return $this->belongsTo('App\Models\Block');
    }
    
    //many to one
    public function element()
    {
        return $this->belongsTo('App\Models\Element');
    }
}
