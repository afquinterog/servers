<?php
namespace App\Cloud;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

abstract class GenericCloudProvider
{

    /**
	 * Create a new instance
	 * 
	 * @param array $parameters
	 */
    public abstract function createInstance($parameters);

    /**
	 * Get the instance data from the provider
	 * 
	 * @param array $parameters
	 */
    public abstract function getInstanceData($parameters);

    /**
	 * Extract value from the instance metadata
	 * 
	 * @param array $parameters
	 */
    public abstract function extractValue($data, $search);

    /**
	 * Stop the instance on the provider
	 * 
	 * @param array $parameters
	 */
    public abstract function terminateInstance($parameters);

    /**
	 * Get the instance parameters for creation
	 * 
	 * @param ServerType $serverType
	 */
    public abstract function getInstanceCreationParameters($serverType);

    /**
	 * Wrapper for the command execution that include debug mode checking
	 * 
	 * @param string $cmd the command to execute 
	 */
	public function executeCommand( $cmd ){

		//Redirect the command result to the standar output
		$cmd = $cmd . " 2>&1 ";

		if( env('CLOUD_DEBUG') ){
			echo sprintf( "Executing fake : %s", $cmd );
		}
		else{
            $result = shell_exec($cmd);
            return $result;
		}
    }
}
