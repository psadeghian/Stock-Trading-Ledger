<?php
require 'dbconnect.php';

$sql = "SELECT * FROM accounts order by account_number";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
while($row = $result->fetch_assoc()) {
//  
 echo "<option ";
 if($_REQUEST["account_number"] == $row["account_number"])
   echo "selected "; 
 echo "value='" . $row["account_number"] . "'>" . $row["account_number"] .
      "</option>";
}
?>
