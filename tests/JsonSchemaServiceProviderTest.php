<?php

namespace AVAllAC\JsonValidatorComponent;

use Silex\Application;

class JsonSchemaServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $template = json_decode('{"type": "object","required": ["a"]}');
        $app = new Application();
        $app->register(new JsonSchemaServiceProvider());
        /** @var JsonValidatorService $validator */
        $validator = $app['jsonValidator'];
        $this->assertTrue($validator->isValid((object)['a' => 2], $template));
    }

    public function testInvalid()
    {
        $template = json_decode('{"type": "object","required": ["a"]}');
        $app = new Application();
        $app->register(new JsonSchemaServiceProvider());
        /** @var JsonValidatorService $validator */
        $validator = $app['jsonValidator'];
        $this->assertFalse($validator->isValid((object)['b' => 2], $template));
    }

    /**
     * @expectedException \AVAllAC\JsonValidatorComponent\ValidationErrorException
     */
    public function testDebug()
    {
        $template = json_decode('{"type": "object","required": ["a"]}');
        $app = new Application();
        $app->register(new JsonSchemaServiceProvider(), ['jsonValidator.debug' => true]);
        /** @var JsonValidatorService $validator */
        $validator = $app['jsonValidator'];
        $validator->isValid((object)['b' => 2], $template);
    }
}
