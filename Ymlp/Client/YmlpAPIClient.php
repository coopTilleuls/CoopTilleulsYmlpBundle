<?php

/*
 * This file is part of the CoopTilleulsYmlpBundle package.
 *
 * (c) La Coopérative des Tilleuls <contact@les-tilleuls.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client;

/**
 * YmlpAPIClient
 * 
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 * @abstract
 */
abstract class YmlpAPIClient
{
    /**
     *
     */
    const API_URL = 'www.ymlp.com/api/';
    
    /**
     *
     * @var string
     */
    protected $apiKey;
    
    /**
     *
     * @var string
     */
    protected $apiUsername; 
    
    /**
     *
     * @var boolean
     */
    protected $useSecure;
    
    /**
     *
     * @var type 
     */
    protected $curl;
    
    /**
     * 
     * @param string $apiKey
     * @param string $apiUsername
     * @param boolean $useSecure
     */
    public function __construct($apiKey, $apiUsername, $useSecure)
    {
        $this->apiKey = $apiKey;
        $this->apiUsername = $apiUsername;
        $this->useSecure = $useSecure;
        
        $this->curl = curl_init();
        
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_USERAGENT, 'CoopTilleulsYmlpBundle for Symfony2 - http://les-tilleuls.coop');
    }
    
    /**
     * 
     */
    public function __destruct()
    {
        curl_close($this->curl);
    }
    
    /**
     * 
     * @param string $method
     * @param array $params
     * @return mixed
     * @throws \RuntimeException
     */
    protected function call($method = '', array $params = array())
    {
        $params['key'] = $this->apiKey;
        $params['username'] = $this->apiUsername;
        $params['output'] = 'JSON';
        
        $query = http_build_query($params);
        
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $query);
        
        if ($this->useSecure) {
            $url = sprintf('https://%s%s', self::API_URL, $method);
        } else {
            $url = sprintf('http://%s%s', self::API_URL, $method);
        }
        
        curl_setopt($this->curl, CURLOPT_URL, $url);
        
        $curlResponse = curl_exec($this->curl);
        
        if (curl_errno($this->curl)) {
            throw new \RuntimeException(sprintf('Curl error: %s', curl_error($this->curl)));
        }
        
        $response = json_decode($curlResponse);
        
        return $this->parseError($response);
    }
    
    /**
     * 
     * @param mixed $response
     * @return mixed
     * @throws \Exception
     */
    protected function parseError($response)
    {
        if (isset($response->Code) && intval($response->Code) > 0) {
            throw new \Exception(sprintf('Ymlp error code %s: %s', $response->Code, $response->Output));
        }
        
        return $response;
    }
    
    /**
     * Is the simplest command, doesn't serve any useful purpose but is a great command to understand this API feature and to test your API implementation.
     * When you call this command, it will output "Hello!"
     * 
     * @return mixed
     */
    public function ping()
    {
        return $this->call('Ping');
    }
    
}