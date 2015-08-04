# [WIP] MukhinContactsBundle

This bundle is in WORK IN PROGRESS state.

Please, don't use it now.

## Installation

### Require bundle via composer
```
php composer.phar require igormukhingmailcom/ContactsBundle
```

### Add bundle to `AppKernel.php`

```php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Mukhin\ContactsBundle\MukhinContactsBundle()
            // ...
        );
    }
```

### Include routes:

```
# app/config/routing.yml
mukhin_contacts:
    resource: "@MukhinContactsBundle/Resources/config/routing.yml"
    prefix:   /contacts
```
