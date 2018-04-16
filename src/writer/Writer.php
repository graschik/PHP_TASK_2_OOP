<?php

declare(strict_types=1);

namespace FileConverter\Writer;

abstract class Writer
{
    private $file;

    public function __construct(string $outputPath)
    {
        $this->file = new \SplFileObject($outputPath, 'w');
    }

    public function getFile(): \SplFileObject
    {
        return $this->file;
    }

    abstract public function write(array $properties): void;
}