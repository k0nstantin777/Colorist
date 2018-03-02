<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Block extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    //Many to One
    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }
    
    //One to Many
    public function elements()
    {
        return $this->hasMany('App\Models\Element');
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
    
    //One to Many
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    
    //Many to One
    public function template()
    {
        return $this->belongsTo('App\Models\Template');
    }
    
}
