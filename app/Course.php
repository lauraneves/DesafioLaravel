<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function category() 
    {
        return $this->belongsTo('App\Category');
    }

    public function users() 
    {
        return $this->belongsToMany('App\Users', 'course_user', 'user_id', 'course_id');
    }
}