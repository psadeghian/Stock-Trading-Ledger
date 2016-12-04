<?php
    // Start the session
    session_start();
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'dbconnect.php';

$sql = "INSERT INTO `equity_transactions` (`account_number`, `transaction_date`, `transaction_type`,
 `shares`, `price_per_share`, `ticker`, `transaction_id`) VALUES (";
$sql .= "'" . $_REQUEST["account_number"] . "', ";
$sql .= "NULL, ";
$sql .= "'" . $_REQUEST["transaction_type"] . "', ";
$sql .= "'" . $_REQUEST["shares"] . "', ";
$sql .= "'" . $_REQUEST["price_per_share"] . "', ";
$sql .= "'" . $_REQUEST["ticker"] . "', ";
$sql .= "NULL";
$sql .= ")";

if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    echo $sql;
    exit;
}
$_SESSION["transaction_success"] = true;
?>

<script>
window.location = 'maketransactionhtm.php';
</script>