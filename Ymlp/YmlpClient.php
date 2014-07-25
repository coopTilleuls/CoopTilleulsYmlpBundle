<?php

/*
 * This file is part of the CoopTilleulsYmlpBundle package.
 *
 * (c) La Coopérative des Tilleuls <contact@les-tilleuls.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp;

use Guzzle\Http\ClientInterface;
use Guzzle\Http\Client;
use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Exception\YmlpException;

/**
 * YmlpClient
 *
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class YmlpClient
{
    /**
     * @var string
     */
    protected $apiKey;
    /**
     * @var string
     */
    protected $apiUsername;
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     *
     * @param string          $apiUrl
     * @param string          $apiKey
     * @param string          $apiUsername
     * @param ClientInterface $client
     */
    public function __construct($apiUrl, $apiKey, $apiUsername, ClientInterface $client = null)
    {
        if (null === $client) {
            $client = new Client($apiUrl);
            $client->setUserAgent('CoopTilleulsYmlpBundle for Symfony2');
        }

        $this->client = $client;
        $this->apiKey = $apiKey;
        $this->apiUsername = $apiUsername;
    }

    /**
     *
     * @param  string        $method
     * @param  array         $params
     * @return array
     * @throws YmlpException
     */
    public function call($method, array $params = array())
    {
        $params['Key'] = $this->apiKey;
        $params['Username'] = $this->apiUsername;
        $params['Output'] = 'JSON';

        $request = $this->client->post($method)->addPostFields($params);
        $response = $request->send();

        $data = $this->parseError($response->json());

        return $data;
    }

    /**
     *
     * @param  array         $data
     * @return array
     * @throws YmlpException
     */
    protected function parseError(array $data)
    {
        if (isset($data['Code']) && intval($data['Code']) > 0) {
            throw new YmlpException($data['Output'], intval($data['Code']));
        }

        return $data;
    }
}
