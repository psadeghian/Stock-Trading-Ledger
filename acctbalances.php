<?php
require 'menu.php';

require 'dbconnect.php';

$sql = "SELECT shares, ticker FROM balances WHERE account_number = " . $_REQUEST["account_number"];
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
echo "<table border=1><th>Shares</th>
<th>Ticker</th>";
while($row = $result->fetch_assoc())
   echo "<tr><td>" . $row["shares"] . "</td><td>" 
   . $row["ticker"] .
      "</td></tr>";
echo "</table>";

?>