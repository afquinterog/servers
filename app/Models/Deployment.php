<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deployment extends Model
{
    /**
     * Get the company
     */
    public function instance()
    {
        return $this->belongsTo('App\Models\Instance');
    }
}
