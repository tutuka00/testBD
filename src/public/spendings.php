<?php
class SpendingCalculator
{
    private $pdo;

    public function __construct($dbUserName, $dbPassword)
    {
        $this->pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);
    }

    public function calculateTotalSpendingAmount()
    {
        $sql = "SELECT * FROM spendings";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $spendings = $statement->fetchAll(PDO::FETCH_ASSOC);

        $totalSpendingsAmount = 0;
        foreach ($spendings as $spending) {
            $totalSpendingsAmount += $spending['amount'];
        }

        return $totalSpendingsAmount;
    }
}
$spendingCalculator = new SpendingCalculator("root", "password");
$totalSpending = $spendingCalculator->calculateTotalSpendingAmount();
echo $totalSpending;
