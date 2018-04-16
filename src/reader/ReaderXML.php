<?php

declare(strict_types=1);

namespace FileConverter\Reader;


class ReaderXML extends Reader
{
    public function __construct(\SplFileObject $file)
    {
        parent::__construct($file);
    }

    public function read(): void
    {
        $xml = simplexml_load_string($this->getFile()->fread($this->getFile()->getSize()), "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml,true);
        $this->setProperties(array(json_decode($json,true)));
    }
}