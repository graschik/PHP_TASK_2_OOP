<?php

declare(strict_types=1);

namespace FileConverter;


class Application
{
    public function run(string $filename, string $outputFormat, string $outputFilePath)
    {
        $converter = new Converter();

        $file = new \SplFileObject($filename, 'r');

        $converter->convert($file, $outputFormat, $outputFilePath);
    }
}
