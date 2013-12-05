# CoopTilleulsYmlpBundle, YMLP API for Symfony2

This bundle integrates [YMLP API](http://www.ymlp.com/) into your [Symfony2](http://symfony.com) projects.

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
# ...
coop_tilleuls_ymlp:
    # YMLP URL for API calls (default to https://www.ymlp.com/api/)
    api_url: ~
    # Your YMLP API key (no default)
    api_key: YOURSECRETAPIKEY1234
    # Your YMLP username (no default)
    api_username: tilleuls
# ...
```
Usage
-----

```php
// Get an instance of the YMLP API client as a service
$ymlpClient = $this->get('coop_tilleuls_ymlp.client');

// Call the simple Ping() command of the YMLP API
$pingResponse = $ymlpClient->call('Ping');

// Add a new contact to one or more groups with exception handling
try {
    $contactsAddResponse = $ymlpClient->call('Contacts.Add', array('Email' => 'baptiste@les-tilleuls.coop', 'GroupID' => 1));
} catch (\CoopTilleuls\Bundle\YmlpBundle\Ymlp\Exception\YmlpException $e) {
    //...
}
```

The `call()` method returns an array containing the response or throws an exception of type `\CoopTilleuls\Bundle\YmlpBundle\Ymlp\Exception\YmlpException`.

You can obtain a list of all the commands of the API, their parameters and their responses on the [API page](http://www.ymlp.com/app/api.php) of [their website](http://www.ymlp.com/) after login.

## Credits

This bundle has been written by Baptiste Meyer for [La Coopérative des Tilleuls](http://les-tilleuls.coop).