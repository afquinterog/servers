<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Get the server type
     */
    public function serverType()
    {
        return $this->belongsTo('App\Models\ServerType');
    }
}
