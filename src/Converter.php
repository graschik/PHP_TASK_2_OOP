<?php

declare(strict_types=1);

namespace FileConverter;

class Converter
{
    private $reader;
    private $writer;

    public function convert(\SplFileObject $file, string $outputFormat, string $outputFilePath)
    {
        $converterStrategy=new ConverterFactory();
        $converterStrategy->choiceOfConverterStrategy($file,$outputFormat,$outputFilePath);

        $this->writer=$converterStrategy->getWriter();
        $this->reader=$converterStrategy->getReader();

        $this->reader->read();
        $this->writer->write($this->reader->getProperties());
    }
}
