<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\SpendingCalculator;

$spendingCalculator = new SpendingCalculator();
$sortedSpendings = $spendingCalculator->sortSpendings();

foreach ($sortedSpendings as $amount) {
    echo $amount . "<br>";
}