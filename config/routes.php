<?php

declare(strict_types=1);

$files = glob(__DIR__ . '/routes/*.php');

foreach ($files as $file) {
    require $file;
}
