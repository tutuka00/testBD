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
    
    public function fetchSpendingByMonth($month)
    {
        $sql = "SELECT name, amount FROM spendings WHERE MONTH(accrual_date) = 2";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':month', $month, PDO::PARAM_INT);
        $statement->execute();
        $spendings = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $spendings;
    }

    public function sortSpendings()
    {
        $spendings = $this->fetchSpendings();
        $amounts = array_column($spendings, 'amount');
        array_multisort($amounts, SORT_ASC, $spendings);
        $sortedAmounts = array_column($spendings, 'amount');
    
        return $sortedAmounts;
    }


    public function fetchSpendings()
    {
        $sql = "SELECT * FROM spendings";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}