<?php

declare(strict_types=1);

namespace FileConverter\Reader;

class ReaderJSON extends Reader
{
    public function __construct(\SplFileObject $file)
    {
        parent::__construct($file);
    }

    public function read(): void
    {
        $properties =json_decode($this->getFile()->fread($this->getFile()->getSize()),true);

        $this->setProperties($properties);
    }
}