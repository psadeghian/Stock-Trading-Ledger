<?php
require 'menu.php';

require 'dbconnect.php';

$sql = "SELECT * FROM accounts";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
echo "<table border=1><th>Account Number</th><th>Date Created</th><th>Primary Client ID</th>
<th>Operations</th>";
while($account = $result->fetch_assoc())
   echo "<tr><td>" . $account["account_number"] . "</td><td>" . $account["date_created"] .
      "</td><td>" .$account["primary_client_id"] . 
      "</td><td><a href='acctdelete.php?account_number=" . $account["account_number"] . "'>Del</a> " .
      "<a href='accttransactions.php?account_number=" . $account["account_number"] . "'>Transactions</a> " .
      "<a href='acctbalances.php?account_number=" . $account["account_number"] . "'>Balances</a> " .
      "</td></tr>";
echo "</table>";

?>
<a href='acctcreatehtm.php'>Create Account</a>

