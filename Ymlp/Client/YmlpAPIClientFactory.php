<?php

namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client;

use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;

class YmlpAPIClientFactory
{
    public static function getArchiveClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\ArchiveMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    public static function getContactsClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\ContactsMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    public static function getFieldsClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\FieldsMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    public static function getFiltersClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\FiltersMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    public static function getGroupsClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\GroupsMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
    public static function getNewsletterClient($apiKey, $apiUsername, $useSecure)
    {
        return new Method\NewsletterMethodsClient($apiKey, $apiUsername, $useSecure);
    }
    
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