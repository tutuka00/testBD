<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\SpendingCalculator;

$spendings = new SpendingCalculator("root", "password");
var_dump($spendings->fetchAllspendings());