<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'dbconnect.php';

$sql = "SELECT * FROM clients order by last_name,first_name";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
while($client = $result->fetch_assoc()) {
//  
 echo "<option ";
 if($_REQUEST["primary_client_id"] == $client["client_id"])
   echo "selected "; 
 echo "value='" . $client["client_id"] . "'>" . $client["first_name"] . " " . $client["last_name"] .
      "</option>";
}
?>
