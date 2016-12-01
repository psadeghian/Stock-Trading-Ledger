<?php
require 'dbconnect.php';

$sql = "DELETE FROM clients where client_id = " . $_REQUEST["client_id"];
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}

?>

<script>
window.location = 'clientlist.php';
</script>