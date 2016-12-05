<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'menu.php';

require 'dbconnect.php';

echo "<table><caption>Overall Performance Report</caption>
</table>";
$sql = "SELECT `shares`, `ticker`, `price` FROM `balances` ";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
echo "<table border=1><th>Shares</th>
<th>Ticker</th>";
while($row = $result->fetch_assoc())
   echo "<tr><td>" . $row["shares"] 
   . "</td><td>" . $row["ticker"] .
      "</td></tr>";
echo "</table>";
// WHERE `account_number` = '" . $_REQUEST["account_number"] . "'"

?>

