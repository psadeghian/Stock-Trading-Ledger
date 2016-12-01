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
   echo "<tr><td height=60>"
   . $stock["ticker"] . "</td><td height=60>" 
   . $stock["priceopen"] ."</td><td height=60>" 
   . $stock["high"] . "</td><td height=60>" 
   . $stock["low"] . "</td><td height=60>" 
   . $stock["marketcap"] . "</td><td height=60>" 
   . $stock["tradetime"] . "</td><td height=60>" 
   . $stock["volumeavg"] . "</td><td height=60>" 
   . $stock["pe"] . "</td><td height=60>" 
   . $stock["eps"] . "</td><td height=60>" 
   . $stock["high52"] . "</td><td height=60>" 
   . $stock["low52"] . "</td><td height=60>" 
   . $stock["change"] . "</td><td height=60>" 
   . $stock["beta"] . "</td><td height=60>" 
   . $stock["changepct"] . "</td><td height=60>" 
   . $stock["closeyest"] . "</td><td height=60>" 
   . $stock["shares"] . "</td></tr>";
echo "</table>";

?>