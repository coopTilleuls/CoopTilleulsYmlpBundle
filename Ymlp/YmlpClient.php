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

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Exception\YmlpException;

/**
 * YmlpClient
 *
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class YmlpClient
{
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
            $client = new Client([
                'base_url' => $apiUrl,
                'defaults' => [
                    'headers' => [
                        'User-Agent' => 'CoopTilleulsYmlpBundle for Symfony2'
                    ],
                    'body' => [
                        'Key' => $apiKey,
                        'Username' => $apiUsername,
                        'Output' => 'JSON'
                    ]
                ]
            ]);
        }

        $this->client = $client;
    }

    /**
     *
     * @param  string        $method
     * @param  array         $params
     * @return array
     * @throws RequestException
     * @throws \LogicException
     * @throws \RuntimeException
     * @throws YmlpException
     */
    public function call($method, array $params = array())
    {
        $response = $this->client->post($method, array('body' => $params));
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
