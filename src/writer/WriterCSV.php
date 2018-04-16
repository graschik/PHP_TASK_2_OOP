<?php

declare(strict_types=1);

namespace FileConverter\Writer;


class WriterCSV extends Writer
{
    public function __construct($outputPath)
    {
        parent::__construct($outputPath);
    }

    public function write(array $properties): void
    {
        foreach ($properties as $property){
            $this->getFile()->fputcsv($property);
        }
    }
}