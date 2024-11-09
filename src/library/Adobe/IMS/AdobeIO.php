<?php
namespace Adobe\IMS;


/**
 * Methods for interacting with AdobeIO Gateway
 * 
 * @author bpack
 *
 */
class AdobeIO
{
    /*
     * URL to IMS Gateway
     */
    private $_endpoint;

    
    
    /**
     * Default Constructor 
     * 
     * @param String URL for AdobeIO Endpoint
     */
    public function __construct ($endpoint)
    {
        $this->_endpoint = $endpoint;
    }
    
    
    /**
     * Method for obtaining a User Token from IMS
     * 
     * @param String $client_id
     * @param String $client_secret
     * @return String
     */
    public function getAccessToken($client_id, $client_secret)
    {
        global $config, $verbose;
        if ($config['adobe']['io']['access_token'] != "") {
            if ($verbose) {
                echo "\nUsing IMS Access Token from config file";
            }
            return $config['adobe']['io']['access_token'];
        }

        if ($verbose) {
            echo "\nCalling to get IMS Access Token";
            echo "\nClient ID: " . $client_id;
            echo "\nClient Secret: " . $client_secret;
        }

        $token_call_body = [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'grant_type' => 'client_credentials',
            'scope' => 'AdobeID,openid,read_organizations,additional_info.job_function,additional_info.projectedProductContext,additional_info.roles'
        ];

        $access_token_curl = curl_init();

        curl_setopt($access_token_curl, CURLOPT_URL, $this->_endpoint);
        curl_setopt($access_token_curl, CURLOPT_POST, true);
        curl_setopt($access_token_curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($access_token_curl, CURLOPT_POSTFIELDS, http_build_query($token_call_body));
        curl_setopt($access_token_curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

        $response = curl_exec($access_token_curl);

        if (curl_errno($access_token_curl)) {
            echo "Error: " . curl_error($access_token_curl);
            exit;
        } else {
            $response_data = json_decode($response, true);
            $token = $response_data['access_token'];
        }

        curl_close($access_token_curl);
        return $token;
    }
}

