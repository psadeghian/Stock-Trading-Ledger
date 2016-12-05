<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<form action="acctassnup.php">
  Account Number:
  <input type="number" name="account_number" readonly="readonly" value="<?php echo $_REQUEST["account_number"] ?>" 
  required>
  <br>
  Client ID:
  <input type="number" name="client_id" readonly="readonly" value="<?php echo $_REQUEST["client_id"] ?>">
  <br>
  Date Associated:
  <input type="text" name="date_associated" readonly="readonly" value="<?php echo $_REQUEST["date_associated"] ?>">
  <br>
  Comment:
  <input type="text" name="comment" value="<?php echo $_REQUEST["comment"] ?>">
  <br>
  <input type="submit" value="Submit">
</form>

<?php
require 'acctassnlist.php';
?>