<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\SpendingDataFetcher;

$spendingDataFetcher = new SpendingDataFetcher();
$spendings = $spendingDataFetcher->fetchSpendingByMonth($month);

foreach ($spendings as $spending) {
    echo $spending["name"] . ": " . $spending["amount"] . "<br>";
}

