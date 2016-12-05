<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<form action="transup.php">
  Account Number:
  <input type="number" name="account_number" readonly="readonly" value="<?php echo $_REQUEST["account_number"] ?>">
  <br>
  Transaction Date:
  <input type="text" name="transaction_date" readonly="readonly" value="<?php echo $_REQUEST["transaction_date"] ?>">
  <br>
  Transaction Type:
  <input type="text" name="transaction_type" readonly="readonly" value="<?php echo $_REQUEST["transaction_type"] ?>">
  <br>
  Shares:
  <input type="number" name="shares" readonly="readonly" value="<?php echo $_REQUEST["shares"] ?>">
  <br>
  Price Per Share:
  <input type="number" step="any" name="price_per_share" readonly="readonly" value="<?php echo $_REQUEST["price_per_share"] ?>">
  <br>
  Ticker:
  <input type="text" name="ticker" readonly="readonly" value="<?php echo $_REQUEST["ticker"] ?>">
  <br>
  Transaction ID:
  <input type="number" name="transaction_id" readonly="readonly" value="<?php echo $_REQUEST["transaction_id"] ?>">
  <br>
  Comment:
  <input type="text" name="comment" value="<?php echo $_REQUEST["comment"] ?>">
  <br>
  <input type="submit" value="Submit">
</form>

<?php
?>