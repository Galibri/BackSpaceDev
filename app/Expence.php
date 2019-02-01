<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
    protected $fillable = [
        'name', 'date', 'details', 'total'
    ];

    protected $dates = [
        'date'
    ];
}
