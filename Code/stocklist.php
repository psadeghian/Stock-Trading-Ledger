<?php
    // Start the session
    session_start();
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
    function clearFields(){
        document.getElementById("price").value = "";
        document.getElementById("priceopen").value = "";
        document.getElementById("high").value = "";
        document.getElementById("low").value = "";
        document.getElementById("marketcap").value = "";
        document.getElementById("tradetime").value = "";
        document.getElementById("volumeavg").value = "";
        document.getElementById("pe").value = "";
        document.getElementById("eps").value = "";
        document.getElementById("high52").value = "";
        document.getElementById("low52").value = "";
        document.getElementById("change").value = "";
        document.getElementById("beta").value = "";
        document.getElementById("changepct").value = "";
        document.getElementById("closeyest").value = "";
        document.getElementById("shares").value = "";
    }
    function setReadOnly(){
        clearFields();
        var action = document.getElementById("action").value;
        if (action == "add"){
            document.getElementById("price").readOnly = false;
            document.getElementById("priceopen").readOnly = false;
            document.getElementById("high").readOnly = false;
            document.getElementById("low").readOnly = false;
            document.getElementById("marketcap").readOnly = false;
            document.getElementById("tradetime").readOnly = false;
            document.getElementById("volumeavg").readOnly = false;
            document.getElementById("pe").readOnly = false;
            document.getElementById("eps").readOnly = false;
            document.getElementById("high52").readOnly = false;
            document.getElementById("low52").readOnly = false;
            document.getElementById("change").readOnly = false;
            document.getElementById("beta").readOnly = false;
            document.getElementById("changepct").readOnly = false;
            document.getElementById("closeyest").readOnly = false;
            document.getElementById("shares").readOnly = false;

        }
        else if (action == "edit"){
            document.getElementById("price").readOnly = false;
            document.getElementById("priceopen").readOnly = false;
            document.getElementById("high").readOnly = false;
            document.getElementById("low").readOnly = false;
            document.getElementById("marketcap").readOnly = false;
            document.getElementById("tradetime").readOnly = false;
            document.getElementById("volumeavg").readOnly = false;
            document.getElementById("pe").readOnly = false;
            document.getElementById("eps").readOnly = false;
            document.getElementById("high52").readOnly = false;
            document.getElementById("low52").readOnly = false;
            document.getElementById("change").readOnly = false;
            document.getElementById("beta").readOnly = false;
            document.getElementById("changepct").readOnly = false;
            document.getElementById("closeyest").readOnly = false;
            document.getElementById("shares").readOnly = false;

        }
        else {
            document.getElementById("price").readOnly = true;
            document.getElementById("priceopen").readOnly = true;
            document.getElementById("high").readOnly = true;
            document.getElementById("low").readOnly = true;
            document.getElementById("marketcap").readOnly = true;
            document.getElementById("tradetime").readOnly = true;
            document.getElementById("volumeavg").readOnly = true;
            document.getElementById("pe").readOnly = true;
            document.getElementById("eps").readOnly = true;
            document.getElementById("high52").readOnly = true;
            document.getElementById("low52").readOnly = true;
            document.getElementById("change").readOnly = true;
            document.getElementById("beta").readOnly = true;
            document.getElementById("changepct").readOnly = true;
            document.getElementById("closeyest").readOnly = true;
            document.getElementById("shares").readOnly = true;
        }
    }
    function updateFields() {
        clearFields();
        var ticker_element = document.getElementById("ticker");
        ticker_element.value = ticker_element.value.toUpperCase();
        var ticker = ticker_element.value;
        var json_obj = <?php echo select_stocks() ?>; 
        // iterate over each element in the array
        for (var i = 0; i < json_obj.length; i++){
        // look for the entry with a matching `code` value
        if (json_obj[i].ticker == ticker){
            // we found it
            // obj[i].name is the matched result
            document.getElementById("price").value = json_obj[i].price; 
            document.getElementById("priceopen").value = json_obj[i].priceopen; 
            document.getElementById("high").value = json_obj[i].high; 
            document.getElementById("low").value = json_obj[i].low; 
            document.getElementById("marketcap").value = json_obj[i].marketcap; 
            document.getElementById("tradetime").value = json_obj[i].tradetime; 
            document.getElementById("volumeavg").value = json_obj[i].volumeavg; 
            document.getElementById("pe").value = json_obj[i].pe; 
            document.getElementById("eps").value = json_obj[i].eps; 
            document.getElementById("high52").value = json_obj[i].high52; 
            document.getElementById("low52").value = json_obj[i].low52; 
            document.getElementById("change").value = json_obj[i].change; 
            document.getElementById("beta").value = json_obj[i].beta; 
            document.getElementById("changepct").value = json_obj[i].changepct; 
            document.getElementById("closeyest").value = json_obj[i].closeyest; 
            document.getElementById("shares").value = json_obj[i].shares; 
        }
        }
    }

</script> 
</head>

<body>
<?php
require 'menu.php';
echo "<form action='stockaction.php' action='clientadd.php'>
  Action:
  <select name='action' id='action' onchange='setReadOnly()' required='required'>
  <option value='add'>Add</option>
  <option value='edit'>Edit</option>
  <option value='del'>Delete</option>
  </select>
  <br>
  Ticker:
  <input type='text' id='ticker' name='ticker' onblur='updateFields()' required='required' >
  <br>
  Price:
  <input type='number' step='any' id='price' name='price' >
  <br>
  Price Open:
  <input type='number' step='any' id='priceopen' name='priceopen' >
  <br>
  High:
  <input type='number' step='any' id='high' name='high' >
  <br>
  Low:
  <input type='number' step='any' id='low' name='low' >
  <br>
  Market Cap:
  <input type='number' id='marketcap' name='marketcap' >
  <br>
  Trade Time:
  <input type='number' step='any' id='tradetime' name='tradetime' >
  <br>  
  Volume Average:
  <input type='number' step='any' id='volumeavg' name='volumeavg' >
  <br>  
  PE:
  <input type='number' step='any' id='pe' name='pe' >
  <br>  
  EPS:
  <input type='number' step='any' id='eps' name='eps' >
  <br>  
  High 52:
  <input type='number' step='any' id='high52' name='high52' >
  <br>  
  Low 52:
  <input type='number' step='any' id='low52' name='low52' >
  <br>  
  Change:
  <input type='number' step='any' id='change' name='change' >
  <br>  
  Beta:
  <input type='number' step='any' id='beta' name='beta' >
  <br>  
  Change Percentage:
  <input type='number' step='any' id='changepct' name='changepct' >
  <br>  
  Close Yesterday:
  <input type='number' step='any' id='closeyest' name='closeyest' >
  <br>  
  Shares:
  <input type='number' id='shares' name='shares' >
  <br> 
  <input type='submit' value='Submit'>
  </form> ";
  require 'stocklister.php';
    function select_stocks() {
    require 'dbconnect.php';
    $sql = "SELECT * FROM `stocks`";
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
?>

</body>