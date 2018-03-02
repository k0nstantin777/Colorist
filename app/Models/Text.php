<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    //Many to One
    public function block()
    {
        return $this->belongsTo('App\Models\Block');
    }
    
    //Many to One
    public function element()
    {
        return $this->belongsTo('App\Models\Element');
    }
}
