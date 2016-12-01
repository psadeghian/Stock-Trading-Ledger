<form action="acctcreate.php">
  Primary Client ID:
 <select name="primary_client_id">
     <?php
         require 'clientopts.php';
     ?>
  </select>
  <br>
  <input type="submit" value="Submit">
</form>