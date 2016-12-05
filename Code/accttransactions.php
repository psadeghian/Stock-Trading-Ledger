<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'menu.php';

require 'dbconnect.php';

$sql = "SELECT `transaction_date`, `transaction_type`, `shares`, `price_per_share`, `ticker`, `transaction_id`, 
`comment` FROM `equity_transactions` WHERE `account_number` = '" . $_REQUEST["account_number"] . "'";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}

echo "<table border=1><caption>Account " . $_REQUEST["account_number"] . " Transactions</caption><th>Transaction Date</th>
<th>Transaction Type</th>
<th>Shares</th>
<th>Price Per Share</th>
<th>Ticker</th>
<th>Transaction ID</th>
<th>Comment</th>
<th>Operation</th>";
while($row = $result->fetch_assoc())
   echo "<tr><td>" . $row["transaction_date"] . "</td><td>" 
   . $row["transaction_type"] ."</td><td>" 
   . $row["shares"] ."</td><td>" 
   . $row["price_per_share"] ."</td><td>" 
   . $row["ticker"] ."</td><td>" 
   . $row["transaction_id"] . "</td><td>" 
   . $row["comment"] . "</td><td>" 
   . "<a href='transedit.php?account_number=" . $_REQUEST["account_number"]
   . "&transaction_date=" . $row["transaction_date"]
   . "&transaction_type=" . $row["transaction_type"]
   . "&shares=" . $row["shares"]
   . "&price_per_share=" . $row["price_per_share"]
   . "&ticker=" . $row["ticker"] 
   . "&transaction_id=" . $row["transaction_id"]
   . "&comment=" . $row["comment"] . "'>Edit Comment</a> " .
      "</td></tr>";
    echo $row["comment"];
echo "</table>";


?>