<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\SpendingCalculator;

$spendingDataFetcher = new SpendingCalculator();
$spendings = $spendingDataFetcher->fetchSpendingByMonth($month);

foreach ($spendings as $spending) {
    echo $spending["name"] . ": " . $spending["amount"] . "<br>";
}

