<?php

declare(strict_types=1);

namespace FileConverter\Tests;

use FileConverter\Converter;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    private $workspace;

    public function test_it_converts_json_file_to_json()
    {
        $outputFilePath = $this->workspace . '/output.json';
        $file = new \SplFileObject(__DIR__ . '/test.json');
        $converter = $this->getConverter();

        $converter->convert($file, 'json', $outputFilePath);

        $this->assertSame(
            '{"a":1,"b":"string","c":{"nested":true}}',
            file_get_contents($outputFilePath)
        );
    }

    public function test_it_converts_csv_file_to_csv()
    {
        $outputFilePath = $this->workspace . '/output.csv';
        $file = new \SplFileObject(__DIR__ . '/test.csv');
        $converter = $this->getConverter();

        $result = $converter->convert($file, 'csv', $outputFilePath);

        $this->assertSame(
            <<<FILE
a,b,c
d,e,f

FILE
,
            file_get_contents($outputFilePath)
        );
    }

    public function test_it_converts_csv_to_json()
    {
        $outputFilePath = $this->workspace . '/output.json';
        $file = new \SplFileObject(__DIR__ . '/test.csv');
        $converter = $this->getConverter();

        $converter->convert($file, 'json', $outputFilePath);

        $this->assertSame(
            '[["a","b","c"],["d","e","f"]]',
            file_get_contents($outputFilePath)
        );
    }

    protected function setUp()
    {
        $this->workspace = sys_get_temp_dir() . '/' . microtime(true) . random_int(100, 999);
        mkdir($this->workspace, 0777, true);
    }

    protected function tearDown()
    {
        @unlink($this->workspace);
    }

    private function getConverter()
    {
        return new Converter(/* ??? */);
    }
}