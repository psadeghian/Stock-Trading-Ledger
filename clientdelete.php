<?php
require 'dbconnect.php';

$sql = "SELECT account_number FROM accounts WHERE primary_client_id = " . $_REQUEST["client_id"];
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
while($row = mysqli_fetch_array($result)){
    $sql = "DELETE FROM balances WHERE account_number = " . $row["account_number"];
    if (!$result = $mysqli->query($sql)) {
        echo "Error: Query error, here is why: </br>";
        echo "Errno: " . $mysqli->errno . "</br>";
        echo "Error: " . $mysqli->error . "</br>";
        exit;
    }

    $sql = "DELETE FROM equity_transactions WHERE account_number = " . $row["account_number"];
    if (!$result = $mysqli->query($sql)) {
        echo "Error: Query error, here is why: </br>";
        echo "Errno: " . $mysqli->errno . "</br>";
        echo "Error: " . $mysqli->error . "</br>";
        exit;
    }

    $sql = "DELETE FROM account_assns where account_number = " . $row["account_number"];
    if (!$result = $mysqli->query($sql)) {
        echo "Error: Query error, here is why: </br>";
        echo "Errno: " . $mysqli->errno . "</br>";
        echo "Error: " . $mysqli->error . "</br>";
        exit;
    }

    $sql = "DELETE FROM accounts where account_number = " . $row["account_number"];
    if (!$result = $mysqli->query($sql)) {
        echo "Error: Query error, here is why: </br>";
        echo "Errno: " . $mysqli->errno . "</br>";
        echo "Error: " . $mysqli->error . "</br>";
        exit;
    }
}

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