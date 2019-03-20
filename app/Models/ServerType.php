<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerType extends Model
{
    /**
     * Get the company
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    /**
     * Get the servers 
     */
    public function servers()
    {
        return $this->hasMany('App\Models\Server');
    }
}