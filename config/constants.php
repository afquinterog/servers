<?php

return [

    'AWS' => [
        'AMI' => 'ami-0b3a95d8345f47eb5',
        'API_SECURITY_GROUP'  => 'venture-api-stage-sg',
        'PROFILE' => 'venture',
        'SSH_KEY' => 'venture-aws-key',
        'STAGING_SERVER_TYPE' => 1
    ],


    'options' => [
        'option_attachment' => '13',
        'option_email' => '14',
        'option_monetery' => '15',
        'option_ratings' => '16',
        'option_textarea' => '17',
    ],

    'DEPLOY_TOKEN' => env('DEPLOY_TOKEN'),

    'METRICS_TOKEN' => env('METRICS_TOKEN'),

];
