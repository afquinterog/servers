<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ApplicationNotification extends Model
{

    use Notifiable;
    /**
     * Get the application
     */
    public function application()
    {
        return $this->belongsTo('App\Models\Application');
    }
}
