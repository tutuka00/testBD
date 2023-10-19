<?php
namespace App;
use PDO;

class SpendingDataFetcher
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", "root", "password");
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
}