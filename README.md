# CoopTilleulsYmlpBundle, YMLP API for Symfony2

This bundle integrates the [Your Mailing List Provider (YMLP)](http://www.ymlp.com/) API into [Symfony2](http://symfony.com) projects.

[![Latest Stable Version](https://poser.pugx.org/tilleuls/ymlp-bundle/v/stable.svg)](https://packagist.org/packages/tilleuls/ymlp-bundle) [![Build Status](https://travis-ci.org/coopTilleuls/CoopTilleulsYmlpBundle.svg)](https://travis-ci.org/coopTilleuls/CoopTilleulsYmlpBundle) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/5be76419-0b77-4283-82c9-7333dcf43595/mini.png)](https://insight.sensiolabs.com/projects/5be76419-0b77-4283-82c9-7333dcf43595)

## Installation

Use [Composer](http://getcomposer.org/) to install this bundle:

    composer require tilleuls/ymlp-bundle

Add the bundle in your application kernel:

```php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        // ...
        new CoopTilleuls\Bundle\YmlpBundle\CoopTilleulsYmlpBundle(),
        // ...
    );
}
```

## Configuration

```yaml
# app/config/config.yml

coop_tilleuls_ymlp:
    # YMLP URL for API calls (default to https://www.ymlp.com/api/)
    api_url: https://www.ymlp.com/api/
    # Your YMLP API key (no default)
    api_key: YOURSECRETAPIKEY1234
    # Your YMLP username (no default)
    api_username: tilleuls
```
Usage
-----

```php
use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Exception\YmlpException;

// Get an instance of the YMLP API client as a service
$ymlpClient = $this->get('coop_tilleuls_ymlp.client');

// Call the simple Ping() command of the YMLP API
$pingResponse = $ymlpClient->call('Ping');

// Add a new contact to one or more groups with exception handling
try {
    $contactsAddResponse = $ymlpClient->call('Contacts.Add', array('Email' => 'baptiste@les-tilleuls.coop', 'GroupID' => 1));
} catch (YmlpException $e) {
    //...
}
```

The `call()` method returns an array containing the response or throws an exception of type `\CoopTilleuls\Bundle\YmlpBundle\Ymlp\Exception\YmlpException`.

You can obtain a list of all the commands of the API, their parameters and their responses on the [YMLP API page](http://www.ymlp.com/app/api.php) (require YMLP credentials).

## Credits

This bundle has been written by Baptiste Meyer for [Les-Tilleuls.coop](http://les-tilleuls.coop).
