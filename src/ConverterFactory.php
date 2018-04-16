<?php

declare(strict_types=1);

namespace FileConverter;

use FileConverter\Reader\Reader;
use FileConverter\Reader\ReaderJSON;
use FileConverter\Reader\ReaderCSV;
use FileConverter\Reader\ReaderXML;
use FileConverter\Writer\Writer;
use FileConverter\Writer\WriterCSV;
use FileConverter\Writer\WriterJSON;
use FileConverter\Writer\WriterXML;


class ConverterFactory
{
    private $reader;
    private $writer;

    public function choiceOfConverterStrategy(\SplFileObject $file, string $outputFormat, string $outputPath): void
    {
        $this->reader = $this->choiceReader($file->getExtension(), $file);
        $this->writer = $this->choiceWriter($outputFormat, $outputPath);
    }

    private function choiceReader(string $formatIn, \SplFileObject $fileIn): ?Reader
    {
        switch ($formatIn) {
            case 'json':
                return new ReaderJSON($fileIn);
            case 'csv':
                return new ReaderCSV($fileIn);
            case 'xml':
                return new ReaderXML($fileIn);
            default:
                return null;
        }
    }

    private function choiceWriter(string $formatOut, string $outputPath): Writer
    {
        switch ($formatOut) {
            case 'json':
                return new WriterJSON($outputPath);
            case 'csv':
                return new WriterCSV($outputPath);
            case 'xml':
                return new WriterXML($outputPath);
            default:
                return null;
        }
    }

    public function getReader(): Reader
    {
        return $this->reader;
    }

    public function getWriter(): Writer
    {
        return $this->writer;
    }
}