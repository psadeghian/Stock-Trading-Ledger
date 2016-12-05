<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
function insert_into_stocks($ticker, $price, $priceopen, $high, $low, $marketcap, $tradetime,
 $tradetime, $volumeavg, $pe, $eps, $high52, $low52, $change, $beta, $changepct, 
 $closeyest, $shares){
  require 'dbconnect.php';
  $sql = "INSERT INTO `stocks` (`ticker`, `price`, `priceopen`, `high`, 
  `low`, `marketcap`, `tradetime`, `volumeavg`, `pe`, `eps`, `high52`, `low52`, `change`, 
  `beta`, `changepct`, `closeyest`, `shares`) VALUES (" 
  . " '" . $ticker . "', " 
  ." '" . $price . "', " 
  ." '" . $priceopen . "', "  
  ." '" . $high . "', "
  ." '" . $low . "', "
  ." '" . $marketcap . "', "  
  ." '" . $tradetime . "', " 
  ." '" . $volumeavg . "', "
  ." '" . $pe . "', "
  ." '" . $eps . "', " 
  ." '" . $high52 . "', " 
  ." '" . $low52 . "', "
  ." '" . $change . "', " 
  ." '" . $beta . "', "
  ." '" . $changepct . "', " 
  ." '" . $closeyest . "', "
  ." '" . $shares . "')";

  if (!$result = $mysqli->query($sql)) {
      echo "Error: Query error, here is why: </br>";
      echo "Errno: " . $mysqli->errno . "</br>";
      echo "Error: " . $mysqli->error . "</br>";
      echo $sql;
      exit;
  }
 }
function update_stocks($ticker, $price, $priceopen, $high, $low, $marketcap, $tradetime,
  $tradetime, $volumeavg, $pe, $eps, $high52, $low52, $change, $beta, $changepct, 
  $closeyest, $shares){
  require 'dbconnect.php';
  $sql = "UPDATE `stocks` SET 
  `price` = '" . $price . "' 
  , `priceopen` = '" . $priceopen . "'  
  , `high` = '" . $high . "' 
  , `low` = '" . $low . "' 
  , `marketcap` = '" . $marketcap . "' 
  , `tradetime` = '" . $tradetime . "' 
  , `volumeavg` = '" . $volumeavgprice . "' 
  , `pe` = '" . $pe . "' 
  , `eps` = '" . $eps . "' 
  , `high52` = '" . $high52 . "' 
  , `low52` = '" . $low52 . "' 
  , `change` = '" . $change . "' 
  , `beta` = '" . $beta . "' 
  , `changepct` = '" . $changepct . "' 
  , `closeyest` = '" . $closeyest . "' 
  , `shares` = '" . $shares . "' WHERE
  `ticker` = '" . $ticker . "'"; 

  if (!$result = $mysqli->query($sql)) {
      echo "Error: Query error, here is why: </br>";
      echo "Errno: " . $mysqli->errno . "</br>";
      echo "Error: " . $mysqli->error . "</br>";
      echo $sql;
      exit;
  }
}
function delete_from_stocks($ticker){
  require 'dbconnect.php';
  $sql = "DELETE FROM `stocks` WHERE `ticker` = '" . $ticker . "'"; 

  if (!$result = $mysqli->query($sql)) {
      echo "Error: Query error, here is why: </br>";
      echo "Errno: " . $mysqli->errno . "</br>";
      echo "Error: " . $mysqli->error . "</br>";
      echo $sql;
      exit;
  }
}
if ($_REQUEST["action"] == "add") {
    insert_into_stocks($_REQUEST["ticker"], $_REQUEST["price"], $_REQUEST["priceopen"], $_REQUEST["high"], 
    $_REQUEST["low"], $_REQUEST["marketcap"], $_REQUEST["tradetime"],
    $_REQUEST["tradetime"], $_REQUEST["volumeavg"], $_REQUEST["pe"], $_REQUEST["eps"], $_REQUEST["high52"],
     $_REQUEST["low52"], $_REQUEST["change"], $_REQUEST["beta"], $_REQUEST["changepct"], 
    $_REQUEST["closeyest"], $_REQUEST["shares"]);
}
elseif ($_REQUEST["action"] == "edit") {
    update_stocks($_REQUEST["ticker"], $_REQUEST["price"], $_REQUEST["priceopen"], $_REQUEST["high"], 
    $_REQUEST["low"], $_REQUEST["marketcap"], $_REQUEST["tradetime"],
    $_REQUEST["tradetime"], $_REQUEST["volumeavg"], $_REQUEST["pe"], $_REQUEST["eps"], $_REQUEST["high52"],
     $_REQUEST["low52"], $_REQUEST["change"], $_REQUEST["beta"], $_REQUEST["changepct"], 
    $_REQUEST["closeyest"], $_REQUEST["shares"]);
}
elseif ($_REQUEST["action"] == "del"){
    delete_from_stocks($_REQUEST["ticker"]);
}
else{}
?>

<script>
window.location = 'stocklist.php';
</script>