<?php

namespace App;
use PDO;

class IncomeCalculator
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", "root", "password");
    }

    public function sortIncomesByMonth()
    {
        $incomes = $this->fetchIncomes();
        $monthlyTotal = [];

        
        foreach ($incomes as $income) {
            $date = explode("-", $income["accrual_date"]);
            $month = abs($date[1]);

            if (!isset($monthlyTotal[$month])) {
                $monthlyTotal[$month] = 0;
            }

            $monthlyTotal[$month] += $income["amount"];
        }

        
        arsort($monthlyTotal);

        return $monthlyTotal;
    }

    private function fetchIncomes()
    {
        $sql = "SELECT * FROM incomes";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}