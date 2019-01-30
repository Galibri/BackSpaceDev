<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'details', 'estimated_amount', 'estimated_time', 'start_date', 'end_date', 'status', 'comments', 'file_location'
    ];

    public function client() {
        return $this->belongsTo('App\Client');
    }
}
