<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'menu.php';

require 'dbconnect.php';

$sql = "SELECT ROUND(SUM(`shares` * `price`), 2) AS `overall_total` FROM `balances_and_prices_view`
 WHERE `account_number` = " . $_REQUEST["account_number"] ;
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
echo "<table border=1><th>Overall Market Value Of Account " . $_REQUEST["account_number"] . "</th>";
while($row = $result->fetch_assoc())
   echo "<tr><td>" . $row["overall_total"] .
      "</td></tr>";
echo "</table>";

$sql = "SELECT `shares`, `ticker`, `price`, ROUND((`shares` * `price`), 2) AS `total` 
FROM `balances_and_prices_view` WHERE `account_number` = " 
. $_REQUEST["account_number"] ;
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
echo "<table border=1><caption> Account " . $_REQUEST["account_number"] . " Transactions</caption><th>Ticker</th>
<th>Shares</th><th>Price</th><th>Total</th>";
while($row = $result->fetch_assoc())
   echo "<tr><td>" . $row["ticker"] 
   . "</td><td>" . $row["shares"] 
   . "</td><td>" . $row["price"] 
   . "</td><td>" . $row["total"] .
      "</td></tr>";
echo "</table>";

?>