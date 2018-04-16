<?php

declare(strict_types=1);

namespace FileConverter\Writer;


class WriterXML extends Writer
{
    private $xml;

    public function __construct($outputPath)
    {
        $this->xml = new \SimpleXMLElement('<root/>');
        parent::__construct($outputPath);
    }

    public function write(array $properties): void
    {
        $this->propertiesToXml($properties, $this->xml);
        $this->getFile()->fwrite($this->xml->asXML());
    }

    public function propertiesToXml(array $properties, \SimpleXMLElement $label): void
    {
        foreach ($properties as $key => $value) {
            if (is_array($value)) {
                if (is_int($key)) {
                    $key = "e";
                }
                $label = $this->xml->addChild($key);
                $this->propertiesToXml($value, $label);
            } else {
                $this->xml->addChild($key, $value);
            }
        }
    }
}