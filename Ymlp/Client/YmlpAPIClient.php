<?php
namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client;

class YmlpAPIClient
{
    const API_URL = 'www.ymlp.com/api/';
    
    protected $apiKey;
    
    protected $apiUsername;
    
    protected $useSecure;
    
    protected $curl;
    
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
    
    public function __destruct()
    {
        curl_close($this->curl);
    }
    
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
    
    protected function parseError($response)
    {
        if (isset($response->Code) && intval($response->Code) > 0) {
            throw new \Exception(sprintf('Ymlp error code %s: %s', $response->Code, $response->Output));
        }
        
        return $response;
    }
    
    public function ping()
    {
        return $this->call('Ping');
    }
    
}