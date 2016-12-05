<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'menu.php';

require 'dbconnect.php';

$sql = "SELECT * FROM account_assns";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
echo "<table border=1><th>Account Number</th><th>Associated Client ID</th><th>Date Associated</th>
<th>Comments</th><th>Operations</th>";
while($row = $result->fetch_assoc())
   echo "<tr><td>" . $row["client_id"] . "</td><td>" . $row["account_number"] .
      "</td><td>" .$row["date_associated"] . "</td><td>" .$row["comment"] . 
      "</td><td><a href='acctassnsdelete.php?account_number=" . $row["account_number"] .
      "&client_id=" . $row["client_id"] . "'>Remove Association</a> " .
      "<a href='acctassnedit.php?account_number=" . $row["account_number"] .
      "&client_id=" . $row["client_id"] . "&date_associated=" . $row["date_associated"] . "'>Edit Comment</a> " .
      "</td></tr>";
echo "</table>";

?>
<a href='acctassncreatehtm.php'>Create Association</a>

