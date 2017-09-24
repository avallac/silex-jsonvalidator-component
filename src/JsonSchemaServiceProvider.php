<?php

namespace AVAllAC\JsonValidatorComponent;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class JsonSchemaServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['jsonValidator.debug'] = false;
        $app['jsonValidator.path'] = null;

        $app['jsonValidator'] = function () use ($app) {
            return new JsonValidatorService($app['jsonValidator.path'], $app['jsonValidator.debug']);
        };
    }
}