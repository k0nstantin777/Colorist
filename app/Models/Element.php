<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    //Many to One
    public function block()
    {
        return $this->belongsTo('App\Models\Block');
    }
    
    // Many to One
    public function template()
    {
        return $this->belongsTo('App\Models\Template');
    }
    
    //One to Many
    public function texts()
    {
        return $this->hasMany('App\Models\Text');
    }
    
    //One to Many
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
    
    //One to Many
    public function icons()
    {
        return $this->hasMany('App\Models\Icon');
    }
}
