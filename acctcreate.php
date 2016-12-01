<?php
require 'dbconnect.php';

$sql = "INSERT INTO `accounts` (`account_number`, `date_created`, `primary_client_id`)
  VALUES (NULL, NULL," . $_REQUEST["primary_client_id"] . ")";

if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}

?>

<script>
window.location = 'dbconnect.php';
</script>