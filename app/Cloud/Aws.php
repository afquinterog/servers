<?php

namespace App\Cloud;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class Aws extends GenericCloudProvider
{
    
    /**
	 * Get the AWS instance parameters
	 * 
	 * @return string $result the web service result 
	 */
    public function getInstanceCreationParameters($serverType)
    {
        return [
            'ami' => Config::get('constants.AWS.AMI'),
            'security_group' => Config::get('constants.AWS.API_SECURITY_GROUP'),
            'key' => Config::get('constants.AWS.SSH_KEY'),
            'profile' => Config::get('constants.AWS.PROFILE')
        ];
    }


    /**
	 * Create an staging instance
	 * 
	 * @return string $result the web service result 
	 */
    public function createInstance($parameters)
    {

        $ami = $parameters['ami'];
        $securityGroup = $parameters['security_group'];
        $key = $parameters['key'];
        $profile = $parameters['profile'];

        return $this->runCreateInstanceCommand($ami, $securityGroup, $profile, $key, 't2.small');
    }

    /**
	 * Get the create instance command
	 * 
	 * @param string $ami 
     * @param string $securityGroup
     * @param string $profile
     * @param string $key
     * @param string $instanceType    
	 */
    public function runCreateInstanceCommand($ami, $securityGroup, $profile, $key, $instanceType='t2.micro', $creditType="unlimited")
    {
        //Create the instance on aws 
        $cmdData = "ec2 run-instances " . 
        "--image-id %s " . 
        "--security-group-ids %s " .
        "--key-name %s " .
        "--instance-type %s " . 
        "--credit-specification CpuCredits=%s " .
        "--profile %s ";

        $cmd = sprintf('/usr/local/bin/aws ' . $cmdData, 
            $ami,
            $securityGroup,
            $key,
            $instanceType,
            $creditType,
            $profile
        );
         
        Log::info( $cmd );
        return $this->executeCommand($cmd);
    }

    /**
	 * Get the aws instance value
	 * 
	 * @param string $result the aws machine value
	 */
    public function extractValue($data, $search){

        $search = $this->getParam($search);

        $value = $this->getStringBetween($data, $search, ','); 

        $value = str_replace('"', '', $value);
        $value = str_replace(' ', '', $value);  

        return $value;
    }

    /**
	 * Get the instance information
	 * 
	 * @param string $instance
     * @param string $profile
	 */
    public function getInstanceData($parameters)
    {
        //Get instance information
        $instance = $parameters['instance'];
        $profile = $parameters['profile'];

        $cmdData = 'ec2 describe-instances --instance-ids %s --profile venture';
        $cmd = sprintf('/usr/local/bin/aws ' . $cmdData, $instance );
        $result = Aws::executeCommand($cmd);
        return $result;
    }

    /**
	 * Wrap the parameter to be able to search on aws
	 * 
	 * @param string $name the parameter 
	 */
    public function getParam($name)
    {
        return '"' . $name . '":';
    }

    /**
	 * Stop the instance
	 * 
	 * @param string $instance
     * @param string $profile
	 */
    public function terminateInstance($parameters)
    {
        $instance = $parameters['instance'];
        $profile = $parameters['profile'];

        //Get instance information
        $cmdData = 'ec2 terminate-instances --instance-ids %s --profile venture';
        $cmd = sprintf('/usr/local/bin/aws ' . $cmdData, $instance );
        $result = Aws::executeCommand($cmd);
        return $result;
    }

     /**
	 * Get string between two strings
	 * 
	 * @param string $string the string
     * @param string $start the initial string
     * @param string $end the final string 
	 */
    public function getStringBetween($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }



















    /**
     * Get the server ip and update
     * TODO Move this to aws utilities class
     */
    // public function getServerIp($result)
    // {
    //     $ip = $this->getInstanceValue($result, $this->getParam("PublicIpAddress")); 
    //     return $ip;
    // }


    /**
	 * Get the aws instance value
	 * 
	 * @param string $result the aws machine value
	 */
    // public function getInstanceValue($result, $search){

    //     $value = $this->getStringBetween($result, $search, ','); 

    //     $value = str_replace('"', '', $value);
    //     $value = str_replace(' ', '', $value);  

    //     return $value;
    // }

    /**
	 * Create an staging instance
	 * 
	 * @return string $result the web service result 
	 */
    // public function createStagingInstance()
    // {
    //     $ami = Config::get('constants.AWS.AMI');
    //     $securityGroup = Config::get('constants.AWS.API_SECURITY_GROUP');
    //     $key = Config::get('constants.AWS.SSH_KEY');
    //     $profile = Config::get('constants.AWS.PROFILE');

    //     return $this->createInstance($ami, $securityGroup, $profile, $key, 't2.small');
    // }

    /**
	 * Create an ui instance
	 * 
	 * @return string $result the web service result 
	 */
    // public function createUiInstance()
    // {
    //     $ami = Config::get('constants.AWS.UI_AMI');
    //     $securityGroup = Config::get('constants.AWS.UI_SECURITY_GROUP');
    //     $key = Config::get('constants.AWS.SSH_KEY');
    //     $profile = Config::get('constants.AWS.PROFILE');

    //     return $this->createInstance($ami, $securityGroup, $profile, $key, 't2.small');
    // }


    /**
	 * Get the create instance command
	 * 
	 * @param string $ami 
     * @param string $securityGroup
     * @param string $profile
     * @param string $key
     * @param string $instanceType    
	 */
    // public function createInstance($ami, $securityGroup, $profile, $key, $instanceType='t2.micro', $creditType="unlimited")
    // {
    //     //Create the instance on aws 
    //     $cmdData = "ec2 run-instances " . 
    //     "--image-id %s " . 
    //     "--security-group-ids %s " .
    //     "--key-name %s " .
    //     "--instance-type %s " . 
    //     "--credit-specification CpuCredits=%s " .
    //     "--profile %s ";

    //     $cmd = sprintf('/usr/local/bin/aws ' . $cmdData, 
    //         $ami,
    //         $securityGroup,
    //         $key,
    //         $instanceType,
    //         $creditType,
    //         $profile
    //     );
         
    //     Log::info( $cmd );
    //     return $this->executeCommand($cmd);
    // }

    /**
	 * Get the instance information
	 * 
	 * @param string $instance
     * @param string $profile
	 */
    // public function getInstanceData($instance, $profile)
    // {
    //     //Get instance information
    //     $cmdData = 'ec2 describe-instances --instance-ids %s --profile venture';
    //     $cmd = sprintf('/usr/local/bin/aws ' . $cmdData, $instance );
    //     $result = Aws::executeCommand($cmd);
    //     return $result;

    // }

    

}
