<?php

declare(strict_types=1);

require $argv[1] ?? dirname(__DIR__) . '/vendor/autoload.php';
$query = new \Kumwe\Record\Query\RecordQuerySpecification();
if (strlen($query->digest()) !== 64) {
    throw new RuntimeException('Query fingerprint unavailable.');
}
echo 'Package consumer behavior passed.' . PHP_EOL;
