<?php

namespace App\Helpers;

use Illuminate\Console\Command;


class Console
{

    /**
     * Display a title on the screen
     */
    public function showTitle(Command $cmd, $title)
    {
        $cmd->info(''); 
        $cmd->info( $title ); 
        $cmd->info('');
    }
    
}