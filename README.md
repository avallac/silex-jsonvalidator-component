silex-jsonvalidator-component
=============================

silex-jsonvalidator-component is a Silex component for working with JSON Schema.

Installation
------------
Install the silex-jsonvalidator-component using [composer](http://getcomposer.org/).  This project uses
[sematic versioning](http://semver.org/).

```bash
composer require avallac/silex-jsonvalidator-component "~1.0"
```

Parameters
----------
* **jsonValidator.path**: (string) path to json files
* **jsonValidator.debug**: (bool) enable debug
Services
--------
* **jsonValidator**: An instance of JsonValidatorService

Registering
-----------
```php
$app->register(new JsonSchemaServiceProvider(), ['jsonValidator.debug' => true]);
```

JSON Validation
---------------
