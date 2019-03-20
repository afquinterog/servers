<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskResult extends Model
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
    public function server()
    {
        return $this->belongsTo('App\Models\Server');
    }

    /**
     * Get the task
     */
    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
}
