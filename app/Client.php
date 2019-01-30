<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // Mass assignment
    protected $fillable = [
        'name', 'email', 'country', 'skype', 'whatsapp', 'business_type', 'client_source'
    ];

    public function projects() {
        return $this->hasMany('App\Project');
    }
}
