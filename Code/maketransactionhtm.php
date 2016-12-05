<?php
    session_start();
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
try {
    function updatePricePerShare() {
        var ticker_element = document.getElementById("ticker");
        ticker_element.value = ticker_element.value.toUpperCase();
        var ticker = ticker_element.value;
        var json_obj = <?php echo selection_functions() ?>; 
        // iterate over each element in the array
        for (var i = 0; i < json_obj.length; i++){
        // look for the entry with a matching `code` value
        if (json_obj[i].ticker == ticker){
            // we found it
            // obj[i].name is the matched result
            document.getElementById("price_per_share").value = json_obj[i].price;  
        }
        }
    }
}
catch(err){
    document.getElementById("par").innerHTML = err.message;
}
</script>  
</head>
<body>
    <form action="maketransaction.php">
    Account Number:
    <select name="account_number" required="required">
        <?php
            require 'acctopts.php';
        ?>
    </select>
    <br>
    Transaction Type:
    <select name="transaction_type" required="required" >
        <option value="B">Buy</option>
        <option value="S">Sell</option>
    </select>
    <br>
    Ticker Symbol:
    <input type="text" name="ticker" id="ticker" onblur="updatePricePerShare()" required="required">
    <br>
    Number of Shares:
    <input type="number" name="shares" required="required" >
    <br>
    Price Per Shares:
    <input type="number" step="any" name="price_per_share" id="price_per_share" required="required" >
    <br>
    Comment:
    <input type="text" name="comment" id="comment">
    <br>
    Submit
    <input type="submit" value="Submit">
    </form>
    <?php
        function selection_functions() {
        require 'dbconnect.php';
        $sql = "SELECT `ticker`, `price` FROM `stocks`";
        if (!$result = $mysqli->query($sql)) {
            echo "error";
            exit;
        }
        $return_arr = Array();
        while ($row =  mysqli_fetch_array($result)) {
            array_push($return_arr,$row);
        }
        return json_encode($return_arr); 
        }
        if ($_SESSION["transaction_success"] == true) {
            $_SESSION["transaction_success"] = false;
            echo "<p id='success_message' class='message'> Transaction recorded! </p>";
        }
      ?>
</body>