<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use FileConverter\Application;

(new Application())->run($argv[1], $argv[2], $argv[3]);