<?php

/**
 * Default Configuration Settings
 * 
 * You can specify different config files to use at runtime
 * EX:  php bin/queryCatalog.php config=<NAME-HERE> 
 * If one is not provided it will assume:  default.php
 */
$config = array(
        
        /**
         * Environment Setting for development, testing, and debugging
         */
        'environment' => array(
                'state'                         => 'development',
                'verbose'                       => false,
        ),
        
        
        /**
         * Your company specific settings for communicating with Adobe.
         * Most of these settings can be obtained from creating an integration entry in AdobeIO
         *  (https://console.adobe.io/integrations/)
         */
        'adobe' => array(
                'launch'                => array(
                        'launch_env'            => 'Production',
                        'launch_api'            => 'https://reactor.adobe.io/extension_packages',
                        'launch_catalog'        => 'web',
                ),
                'io'                    => array(
                        'ims_end_point'         => 'https://ims-na1.adobelogin.com/ims/token/v3',
                        'ims_org'               => 'YOUR_IMS_ORG_GOES_HERE',
                        'client_id'             => 'YOUR_ADOBEIO_CLIENT_ID_GOES_HERE',
                        'client_secret'         => "YOUR_ADOBEIO_CLIENT_SECRET_GOES_HERE", 
                        'access_token'             => "",  // Only place a value here if you want to override the library from generating an auth token (useful for debugging)
                ),
        ),
        
        
        /**
         * You must create an Incoming WebHook integration on your slack instance and add the URL it provides here.
         * You can add as many as you'd like if you want to notify multiple groups or channels.
         */
        'slack' => array(
                'webhooks'              => array(
                                                 "YOUR_SLACK_WEB_HOOK_GOES_HERE",
                ),
        ),
);
