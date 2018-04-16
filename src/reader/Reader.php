<?php

declare(strict_types=1);

namespace FileConverter\Reader;

abstract class Reader
{
    private $file;
    private $properties;

    public function __construct(\SplFileObject $file)
    {
        $this->file = $file;
        $this->properties = array();
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }

    public function getFile(): \SplFileObject
    {
        return $this->file;
    }

    abstract public function read(): void;
}