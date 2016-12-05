<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'dbconnect.php';
$sql = "update account_assns "; 
$sql .= "set comment = '" . $_REQUEST["comment"] . "', "; 
$sql .= "date_associated = '" . $_REQUEST["date_associated"] . "' "; 
$sql .= "WHERE `client_id` = '" . $_REQUEST["client_id"];
 $sql .= "' AND `account_number` = '" . $_REQUEST["account_number"] . "'";
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