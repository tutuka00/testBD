<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\IncomeCalculator;

$incomeCalculator = new IncomeCalculator();
$sortedIncomes = $incomeCalculator->sortIncomesByMonth();

foreach ($sortedIncomes as $month => $amount) {
    echo $month . "月: " . $amount . "<br>";
}