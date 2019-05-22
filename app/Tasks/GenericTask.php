<?php

namespace App\Tasks;

use App\Traits\RemoteExecution;
use App\Cloud\GenericCloudProvider;


abstract class GenericTask 
{
    use RemoteExecution;

    protected $provider;

    public function __construct() {
    }
    

    public abstract function run($instance, $task);

    public abstract function afterRun($result);
    
}
