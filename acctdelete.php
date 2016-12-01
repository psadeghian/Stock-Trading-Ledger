<?php
require 'menu.php';
require 'dbconnect.php';

$sql = "DELETE FROM balances WHERE account_number = " . $_REQUEST["account_number"];
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}

$sql = "DELETE FROM equity_transactions WHERE account_number = " . $_REQUEST["account_number"];
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}

$sql = "DELETE FROM account_assns where account_number = " . $_REQUEST["account_number"];
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}

$sql = "DELETE FROM accounts where account_number = " . $_REQUEST["account_number"];
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}

?>

<script>
window.location = 'acctlist.php';
</script>