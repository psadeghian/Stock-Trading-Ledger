<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'dbconnect.php';
$sql = "update `equity_transactions` "; 
$sql .= "set `comment` = '" . $_REQUEST["comment"] . "' "; 
$sql .= "WHERE `transaction_id` = '" . $_REQUEST["transaction_id"] . "'";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    echo $sql;
    exit;
}

?>

<script>
window.location = 'transedit.php';
</script>