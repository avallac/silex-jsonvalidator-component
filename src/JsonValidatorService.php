<?php

namespace AVAllAC\JsonValidatorComponent;

use JsonSchema\Validator;

class JsonValidatorService
{
    protected $basePath;
    protected $debug;

    public function __construct($basePath, $debug = false)
    {
        $this->basePath = $basePath;
        $this->debug = $debug;
    }

    public function isValidByTemplateFile($verifiableData, $templateFile)
    {
        return $this->isValid($verifiableData, (object)['$ref' => 'file://'.$this->basePath.'/'.$templateFile]);
    }

    public function isValid($verifiableData, $template)
    {
        $validator = new Validator();
        $validator->validate($verifiableData, $template);
        if (!$validator->isValid()) {
            if ($this->debug) {
                $out = "JSON does not validate. Violations:\n";
                foreach ($validator->getErrors() as $error) {
                    $out .= sprintf("[%s] %s\n", $error['property'], $error['message']);
                }
                throw new ValidationErrorException($out);
            }
            return false;
        }
        return true;
    }
}