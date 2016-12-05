<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<form action="acctassncreate.php">
  Client ID:
 <select name="client_id" required>
     <?php
         require 'clientopts.php';
     ?>
  </select>
  <br>
    Account Number:
 <select name="account_number" required>
     <?php
         require 'acctopts.php';
     ?>
  </select>
  <br>
  Comment:
  <input type="text" name="comment">
  <br>
  <input type="submit" value="Submit">
</form>