<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'menu.php';

require 'dbconnect.php';

$sql = "SELECT ROUND(SUM(`shares` * `price`), 2) AS `overall_total` FROM `clients_balances_and_prices_view`
 WHERE `client_id` = " . $_REQUEST["client_id"] ;
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    echo $sql;
    exit;
}
echo "<table border=1><th>Overall Market Value Of Accounts Owned And Associated With Client</th>";
while($row = $result->fetch_assoc())
   echo "<tr><td>" . $row["overall_total"] .
      "</td></tr>";
echo "</table>";

$sql = "SELECT `account_number`, `shares`, `ticker`, `price`, ROUND((`shares` * `price`), 2) AS `total` 
FROM `clients_balances_and_prices_view` WHERE `client_id` = " 
. $_REQUEST["client_id"] ;
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    echo $sql;
    exit;
}
echo "<table border=1><th>Account Number</th><th>Ticker</th>
<th>Shares</th><th>Price</th><th>Total</th><th>Account Details</th>";
while($row = $result->fetch_assoc())
   echo "<tr><td>" . $row["account_number"] 
    . "</td><td>" . $row["ticker"] 
   . "</td><td>" . $row["shares"] 
   . "</td><td>" . $row["price"] 
   . "</td><td>" . $row["total"] .
   "</td><td>" . 
   "<a href='accttransactions.php?account_number=" . $row["account_number"] . "'>Transactions</a> "
   . "<a href='acctbalances.php?account_number=" . $row["account_number"] . "'>Summary And Balances</a> " 
   . "</td></tr>";
echo "</table>";

$sql = "SELECT `account_number` 
FROM `accounts` WHERE `primary_client_id` = '" 
. $_REQUEST["client_id"] . "'";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    echo $sql;
    exit;
}
echo "<table border=1><caption>Accounts Owned By Client</caption><th>Account Number</th><th>Account Details</th>";
while($row = $result->fetch_assoc())
   echo "<tr><td>" . $row["account_number"] 
   . "</td><td>" 
   . "<a href='accttransactions.php?account_number=" . $row["account_number"] . "'>Transactions</a> "
   . "<a href='acctbalances.php?account_number=" . $row["account_number"] . "'>Summary And Balances</a> " 
    . "</td></tr>";
echo "</table>";

$sql = "SELECT `account_number` 
FROM `account_assns` WHERE `client_id` = '" 
. $_REQUEST["client_id"] . "'";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    echo $sql;
    exit;
}
echo "<table border=1><caption>Accounts Associated With Client</caption><th>Account Number</th><th>Account Details</th>";
while($row = $result->fetch_assoc())
   echo "<tr><td>" . $row["account_number"] 
   . "</td><td>"
   . "<a href='accttransactions.php?account_number=" . $row["account_number"] . "'>Transactions</a> "
   . "<a href='acctbalances.php?account_number=" . $row["account_number"] . "'>Summary And Balances</a> " 
    . "</td></tr>";
echo "</table>";

?>