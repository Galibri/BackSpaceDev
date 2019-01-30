<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug', 'excerpt', 'title', 'content', 'type', 'status'
    ];

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
