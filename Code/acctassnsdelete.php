<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'menu.php';
require 'dbconnect.php';

$sql = "DELETE FROM `account_assns` WHERE `account_number` = '" . $_REQUEST["account_number"] .
"' AND `client_id` = '" . $_REQUEST["client_id"] . "'";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}

?>

<script>
window.location = 'acctassnlist.php';
</script>