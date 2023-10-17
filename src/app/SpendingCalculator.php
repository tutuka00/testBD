<?php
namespace App;
use PDO;


class SpendingCalculator
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8","root", "password" );
    }

    public function calculateTotalSpendingAmount()
    {
        $spendings = $this->fetchAllSpendings();

        $totalSpendingsAmount = 0;
        foreach ($spendings as $spending) {
            $totalSpendingsAmount += $spending['amount'];
        }

        return $totalSpendingsAmount;
    }

    public function fetchAllSpendings()
    {
        $sql = "SELECT * FROM spendings";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $spendings = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $spendings;
    }
}