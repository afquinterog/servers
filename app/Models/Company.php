<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Database;

class Company extends Model
{
    use SoftDeletes;
    use Database;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the company users
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
    
}
