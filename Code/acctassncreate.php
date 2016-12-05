<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'dbconnect.php';

$sql = "INSERT INTO `account_assns` (`account_number`, `client_id`, `date_associated`, `comment`)
  VALUES ('" . $_REQUEST["account_number"] . "', '" 
  . $_REQUEST["client_id"] . "', " 
  . "NULL, '" 
  . $_REQUEST["comment"] . "')";

if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    echo $sql;
    exit;
}

?>

<script>
window.location = 'acctassnlist.php';
</script>