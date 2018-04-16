<?php

declare(strict_types=1);

namespace FileConverter\Writer;


class WriterJSON extends Writer
{
    public function __construct($outputPath)
    {
        parent::__construct($outputPath);
    }

    public function write(array $properties): void
    {
        $this->getFile()->fwrite(json_encode($properties));
    }
}