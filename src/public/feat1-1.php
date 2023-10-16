<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\SpendingCalculator;

$spendingCalculator = new SpendingCalculator("root", "password");
$totalSpending = $spendingCalculator->calculateTotalSpendingAmount();

echo  $totalSpending;