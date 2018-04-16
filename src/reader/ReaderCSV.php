<?php

declare(strict_types=1);

namespace FileConverter\Reader;


class ReaderCSV extends Reader
{
    public function __construct(\SplFileObject $file)
    {
        parent::__construct($file);
    }

    public function read(): void
    {
        $properties = array();

        while (!$this->getFile()->eof()) {
            $properties[] = $this->getFile()->fgetcsv();
        }

        $this->setProperties($properties);
    }
}