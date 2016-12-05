<?php
    //function selection_functions($input) {
    //require 'dbconnect.php';
    //$sql = "SELECT ticker, price FROM stocks WHERE ticker = '" . $input . "'";
    //if (!$result = $mysqli->query($sql)) {
    //    echo "Error: Query error, here is why: </br>";
    //    echo "Errno: " . $mysqli->errno . "</br>";
    //    echo "Error: " . $mysqli->error . "</br>";
    //    exit;
    //}
    //$price = "";
    /*
    while ($row =  mysqli_fetch_array($result)) {
        return $row["price"];
    }
    }
    echo selection_functions("a");
    */
    /*
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
            $shares = $row;
            echo "number of shares is:";
            echo $shares;
        }
        else {
            $shares = 0;
        }
        }
        return $shares;
    }
    */
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
    echo update_balances(1,6,"A");
    ?>