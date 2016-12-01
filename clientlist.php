<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'menu.php';

require 'dbconnect.php';

$sql = "SELECT * FROM clients";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
echo "<table border=1><th>First Name</th><th>Last Name</th><th>Email</th><th>Street</th><th>City</th>
<th>State</th><th>Zip Code</th><th>Phone Number</th><th>Birth Date</th><th>Sex</th><th>Date Entered</th>
<th>Client ID</th><th>Operations</th>";
while($client = $result->fetch_assoc())
   echo "<tr><td>" . $client["first_name"] . "</td><td>" . $client["last_name"] .
      "</td><td>" .$client["email"] . "</td><td>" .$client["street"] . "</td><td>" .$client["city"] . 
      "</td><td>" .$client["state"] . "</td><td>" .$client["zip"] . "</td><td>" .$client["phone"] . 
      "</td><td>" .$client["birth_date"] . "</td><td>" .$client["sex"] . "</td><td>" .$client["date_entered"] .
      "</td><td>" .$client["client_id"] . 
      "</td><td><a href='clientdelete.php?client_id=" . $client["client_id"] . "'>Del</a> " .
      "<a href='clientedit.php?client_id=" . $client["client_id"] . "&first_name=" . $client["first_name"] .
      "&last_name=" . $client["last_name"] . "&email=" . $client["email"] . 
      "&street=" . $client["street"] . "&city=" . $client["city"] . 
      "&state=" . $client["state"] . "&zip=" . $client["zip"] . 
      "&phone=" . $client["phone"] . "&birth_date=" . $client["birth_date"] . 
      "&sex=" . $client["sex"] . "&date_entered=" . $client["date_entered"] . 
      "'>Edit</a>" .
      "</td></tr>";
echo "</table>";

?>
<a href='clientadd.htm'>Add a Client</a>