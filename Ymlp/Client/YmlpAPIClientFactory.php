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

use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;

/**
 * YmlpAPIClientFactory
 * 
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class YmlpAPIClientFactory
{
    /**
     * 
     * @param string $apiKey
     * @param string $apiUsername
     * @param boolean $useSecure
     * @return \CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method\ArchiveMethodsClient
     */
    public static function getArchiveClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\ArchiveMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    /**
     * 
     * @param string $apiKey
     * @param string $apiUsername
     * @param boolean $useSecure
     * @return \CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method\ContactsMethodsClient
     */
    public static function getContactsClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\ContactsMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    /**
     * 
     * @param string $apiKey
     * @param string $apiUsername
     * @param boolean $useSecure
     * @return \CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method\FieldsMethodsClient
     */
    public static function getFieldsClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\FieldsMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    /**
     * 
     * @param string $apiKey
     * @param string $apiUsername
     * @param boolean $useSecure
     * @return \CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method\FiltersMethodsClient
     */
    public static function getFiltersClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\FiltersMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    /**
     * 
     * @param string $apiKey
     * @param string $apiUsername
     * @param boolean $useSecure
     * @return \CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method\GroupsMethodsClient
     */
    public static function getGroupsClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\GroupsMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    /**
     * 
     * @param string $apiKey
     * @param string $apiUsername
     * @param boolean $useSecure
     * @return \CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method\NewsletterMethodsClient
     */
    public static function getNewsletterClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\NewsletterMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    /**
     * 
     * @param string $name
     * @param string $apiKey
     * @param string $apiUsername
     * @param boolean $useSecure
     * @return mixed
     * @throws InvalidArgumentException
     */
    public static function getClient($name, $apiKey, $apiUsername, $useSecure)
    {
        switch(strtolower($name)){
            case 'archive':
                return self::getArchiveClient($apiKey, $apiUsername, $useSecure);
                break;
            case 'contacts':
                return self::getContactsClient($apiKey, $apiUsername, $useSecure);
                break;
            case 'fields':
                return self::getFieldsClient($apiKey, $apiUsername, $useSecure);
                break;
            case 'filters':
                return self::getFiltersClient($apiKey, $apiUsername, $useSecure);
                break;
            case 'groups':
                return self::getGroupsClient($apiKey, $apiUsername, $useSecure);
                break;
            case 'newsletter':
                return self::getNewsletterClient($apiKey, $apiUsername, $useSecure);
                break;
            default:
                throw new InvalidArgumentException(sprintf('Invalid Ymlp client: %s', $name));
        }
    }    
}