<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerEvent extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'event_date',
    ];

    /**
     * Get the server
     */
    public function server()
    {
        return $this->belongsTo('App\Models\Server');
    }

    public function getEventDateWithElapsedTimeAttribute()
    {
        return  $this->diffInTime($this->event_date);
    }

    public function diffInTime($date)
    {
        if(is_object($date)){
            $days = $date->diffInDays() ?? 0 ;
            //$sign = $date >= now() ? "+" : "-";

            if ($days >= 30) {
                return $date->diffInMonths() . " " . __("Months") . " " . __('Ago');
            } else {
                return $date->diffInDays() . " " . __("Days") . " " . __('Ago');
            }
        }

        return "";
    }
}
