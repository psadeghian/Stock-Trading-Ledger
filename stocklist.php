<?php
require 'menu.php';

require 'dbconnect.php';

$sql = "SELECT * FROM stocks";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
echo "<table border=1>
<th>Ticker</th>
<th>Open</th>
<th>High</th>
<th>Low</th>
<th>Market Cap</th>
<th>Trade Time</th>
<th>Average Volume</th>
<th>PE</th>
<th>EPS</th>
<th>High 52</th>
<th>Low 52</th>
<th>Change</th>
<th>Beta</th>
<th>Change pct</th>
<th>Yesterday Close</th>
<th>Shares</th>";
while($stock = $result->fetch_assoc())
   echo "<tr><td>"
   . $stock["ticker"] . "</td><td>" 
   . $stock["priceopen"] ."</td><td>" 
   . $stock["high"] . "</td><td>" 
   . $stock["low"] . "</td><td>" 
   . $stock["marketcap"] . "</td><td>" 
   . $stock["tradetime"] . "</td><td>" 
   . $stock["volumeavg"] . "</td><td>" 
   . $stock["pe"] . "</td><td>" 
   . $stock["eps"] . "</td><td>" 
   . $stock["high52"] . "</td><td>" 
   . $stock["low52"] . "</td><td>" 
   . $stock["change"] . "</td><td>" 
   . $stock["beta"] . "</td><td>" 
   . $stock["changepct"] . "</td><td>" 
   . $stock["closeyest"] . "</td><td>" 
   . $stock["shares"] . "</td></tr>";
echo "</table>";

?>