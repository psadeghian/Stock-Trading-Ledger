<?php
    // Start the session
    session_start();
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'dbconnect.php';
function insert_transaction($account_number, $transaction_type,
    $shares, $price_per_share, $ticker, $comment)
{
    require 'dbconnect.php';
    $success = false;
    $sql = "INSERT INTO `equity_transactions` (`account_number`, `transaction_date`, `transaction_type`,
    `shares`, `price_per_share`, `ticker`, `transaction_id`, `comment`) VALUES (";
    $sql .= "'" . $account_number . "', ";
    $sql .= "NULL, ";
    $sql .= "'" . $transaction_type . "', ";
    $sql .= "'" . $shares . "', ";
    $sql .= "'" . $price_per_share . "', ";
    $sql .= "'" . $ticker . "', ";
    $sql .= "NULL ";
    $sql .= "'" . $comment . "'";
    $sql .= ")";

    if (!$result = $mysqli->query($sql)) {
        echo "Error: Insert error, here is why: </br>";
        echo "Errno: " . $mysqli->errno . "</br>";
        echo "Error: " . $mysqli->error . "</br>";
        echo $sql;
        exit;
    }
    else {
        $success = true;
    }
    return $success;
}
function insert_balance($account_number, $shares, $ticker)
{
    require 'dbconnect.php';
    $success = false;
    $sql = "INSERT INTO `balances` (`account_number`, `shares`, `ticker`) VALUES (";
    $sql .= "'" . $account_number . "', ";
    $sql .= "'" . $shares . "', ";
    $sql .= "'" . $ticker . "'";
    $sql .= ")";

    if (!$result = $mysqli->query($sql)) {
        echo "Error: Insert error, here is why: </br>";
        echo "Errno: " . $mysqli->errno . "</br>";
        echo "Error: " . $mysqli->error . "</br>";
        echo $sql;
        exit;
    }
    else {
        $success = true;
    }
    return $success;
}
function delete_balance($account_number, $ticker)
{
    require 'dbconnect.php';
    $success = false;
    $sql = "DELETE FROM `balances` WHERE ";
    $sql .= "`account_number` = '" . $account_number . "' AND ";
    $sql .= "`ticker` = '" . $ticker . "'";

    if (!$result = $mysqli->query($sql)) {
        echo "Error: Insert error, here is why: </br>";
        echo "Errno: " . $mysqli->errno . "</br>";
        echo "Error: " . $mysqli->error . "</br>";
        echo $sql;
        exit;
    }
    else {
        $success = true;
    }
    return $success;
}
function update_balances($account_number, $shares, $ticker)
{
    require 'dbconnect.php';
    $success = false;
    if ($shares < 0) 
    {
        echo "Number of shares cannot be negative.";
    }
    else{
    $sql = "UPDATE `balances` SET ";
    $sql .= "`shares` = '" . $shares . "' WHERE";
    $sql .= "`account_number` = '" . $account_number . "' AND ";
    $sql .= "`ticker` = '" . $ticker . "'";
   if (!$result = $mysqli->query($sql)) {
        echo "Error: Update error, here is why: </br>";
        echo "Errno: " . $mysqli->errno . "</br>";
        echo "Error: " . $mysqli->error . "</br>";
        echo $sql;
        exit;
    }
    else {
        $success = true;
    } 
    }
    return $success;    
}
function return_current_shares_from_balance($account_number, $ticker) {
    require 'dbconnect.php';
    $shares = null;
    $sql = "SELECT `shares` FROM `balances` WHERE ";
    $sql .= "`account_number` = '" . $account_number . "' AND ";
    $sql .= "`ticker` = '" . $ticker . "'";
    if (!$result = $mysqli->query($sql)) {
        echo "Error: Query error, here is why: </br>";
        echo "Errno: " . $mysqli->errno . "</br>";
        echo "Error: " . $mysqli->error . "</br>";
        echo $sql;
        exit;
    }
    else {
    if($row = mysqli_fetch_row($result)){
        $shares = $row[0];
    }
    else {
        $shares = 0;
    }
    }
    return $shares;
}

if ($_REQUEST["shares"] <= 0){
    $_SESSION["transaction_success"] = false;
}
elseif ($_REQUEST["transaction_type"] == "B") {
    $available_shares = return_current_shares_from_balance($_REQUEST["account_number"], $_REQUEST["ticker"]);
    if ($available_shares == 0) {
        $success = insert_balance($_REQUEST["account_number"], $_REQUEST["shares"], $_REQUEST["ticker"]);
        if ($success == true){
            $success = insert_transaction($_REQUEST["account_number"], $_REQUEST["transaction_type"],
            $_REQUEST["shares"], $_REQUEST["price_per_share"], $_REQUEST["ticker"], $_REQUEST["comment"]);
            if ($success = true) {
                $_SESSION["transaction_success"] = true;
            } 
            else {}
        }
        else {}
    }
    elseif ($available_shares > 0){
        $available_shares = $available_shares + $_REQUEST["shares"];
        $success = update_balances($_REQUEST["account_number"], $available_shares, $_REQUEST["ticker"]);
        if ($success == true){
            $success = insert_transaction($_REQUEST["account_number"], $_REQUEST["transaction_type"],
            $_REQUEST["shares"], $_REQUEST["price_per_share"], $_REQUEST["ticker"], $_REQUEST["comment"]);
            if ($success = true) {
                $_SESSION["transaction_success"] = true;
            } 
            else {}
        }
        else {}
    }
    else {}
}
elseif ($_REQUEST["transaction_type"] == "S") {
    $available_shares = return_current_shares_from_balance($_REQUEST["account_number"], $_REQUEST["ticker"]);
    if ($available_shares > 0 && $_REQUEST["shares"] < $available_shares){
        $available_shares = $available_shares - $_REQUEST["shares"];
        $success = update_balances($_REQUEST["account_number"], $available_shares, 
        $_REQUEST["ticker"]);
        if ($success == true) {
            $success = insert_transaction($_REQUEST["account_number"], $_REQUEST["transaction_type"],
            $_REQUEST["shares"], $_REQUEST["price_per_share"], $_REQUEST["ticker"], $_REQUEST["comment"]);
            if ($success = true) {
                $_SESSION["transaction_success"] = true;
            } 
            else {}
        }
        else {}
    }
    elseif ($available_shares > 0 && $_REQUEST["shares"] == $available_shares) {
        $success = delete_balance($_REQUEST["account_number"], $_REQUEST["ticker"]);
        if ($success == true) {
            $success = insert_transaction($_REQUEST["account_number"], $_REQUEST["transaction_type"],
            $_REQUEST["shares"], $_REQUEST["price_per_share"], $_REQUEST["ticker"], $_REQUEST["comment"]);
            if ($success = true) {
                $_SESSION["transaction_success"] = true;
            } 
            else {}
        }
        else {}
    }
    else {}
    }
else {}
?>

<script>
window.location = 'maketransactionhtm.php';
</script>