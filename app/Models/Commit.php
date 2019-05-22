<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'timestamp',
    ];

    /**
     * Get the company
     */
    public function application()
    {
        return $this->belongsTo('App\Models\Application');
    }
}
