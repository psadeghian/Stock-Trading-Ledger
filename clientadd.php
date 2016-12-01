<?php
require 'dbconnect.php';

$sql = "INSERT INTO `clients` (`first_name`, `last_name`, `email`,
 `street`, `city`, `state`, `zip`, `phone`, `birth_date`, `sex`, `date_entered`, `client_id`)
  VALUES ('" . $_REQUEST["first_name"] . "','" . $_REQUEST["last_name"] . "','"
  . $_REQUEST["email"] . "','" . $_REQUEST["street"] . "','" . $_REQUEST["city"] . "','"
  . $_REQUEST["state"] . "','" . $_REQUEST["zip"] . "','" . $_REQUEST["phone"] . "','"
  . $_REQUEST["birth_date"] . "','" . $_REQUEST["sex"] . "', 'NULL', 'NULL')";

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