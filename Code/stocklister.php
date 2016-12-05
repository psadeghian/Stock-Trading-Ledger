<?php
require 'dbconnect.php';

if ($_SESSION["asc_desc"] == "ASC"){
    $_SESSION["asc_desc"] = "DESC";
}
else{
    $_SESSION["asc_desc"] = "ASC";
}
if ($_REQUEST["order_by"] == null){
    $orderby = "ticker";
}
else{
    $orderby = $_REQUEST["order_by"];
}
$sql = "SELECT * FROM `stocks` ORDER BY " . $orderby . " " . $_SESSION["asc_desc"];
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    echo $sql;
    exit;
}
echo "<table border=1>
<th><a href=stocklist.php?order_by=`ticker`>Ticker</a></th>
<th><a href=stocklist.php?order_by=`priceopen`>Open</a></th>
<th><a href=stocklist.php?order_by=`high`>High</a></th>
<th><a href=stocklist.php?order_by=`low`>Low</a></th>
<th><a href=stocklist.php?order_by=`marketcap`>Market Cap</a></th>
<th><a href=stocklist.php?order_by=`tradetime`>Trade Time</a></th>
<th><a href=stocklist.php?order_by=`volumeavg`>Avg Volume</a></th>
<th><a href=stocklist.php?order_by=`pe`>PE</a></th>
<th><a href=stocklist.php?order_by=`eps`>EPS</a></th>
<th><a href=stocklist.php?order_by=`high52`>High 52</a></th>
<th><a href=stocklist.php?order_by=`low52`>Low 52</a></th>
<th><a href=stocklist.php?order_by=`change`>Change</a></th>
<th><a href=stocklist.php?order_by=`beta`>Beta</a></th>
<th><a href=stocklist.php?order_by=`changepct`>Change PCT</a></th>
<th><a href=stocklist.php?order_by=`closeyest`>Close Yesterday</a></th>
<th><a href=stocklist.php?order_by=`shares`>Shares</a></th>";
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