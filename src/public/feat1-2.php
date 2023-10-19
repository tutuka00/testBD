<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\SpendingDataFetcher;

$dbUserName = "root";
$dbPassword = "password";

$spendingDataFetcher = new SpendingDataFetcher($dbUserName, $dbPassword);
$month = 2;
$spendings = $spendingDataFetcher->fetchSpendingByMonth($month);

foreach ($spendings as $spending) {
    echo $spending["name"] . ": " . $spending["amount"] . "<br>";
}
