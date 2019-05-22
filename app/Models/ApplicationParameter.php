<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationParameter extends Model
{

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the server 
     */
    public function application()
    {
        return $this->belongsTo('App\Models\Application');
    }
}
