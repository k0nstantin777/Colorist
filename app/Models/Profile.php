<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }
}
