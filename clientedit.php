<form action="clientup.php">
  First name:
  <input type="text" name="first_name" value="<?php echo $_REQUEST["first_name"] ?>">
  <br>
  Last name:
  <input type="text" name="last_name" value="<?php echo $_REQUEST["last_name"] ?>">
  <br>
  Email:
  <input type="email" name="email" value="<?php echo $_REQUEST["email"] ?>">
  <br>
  Street:
  <input type="text" name="street" value="<?php echo $_REQUEST["street"] ?>">
  <br>
  City:
  <input type="text" name="city" value="<?php echo $_REQUEST["city"] ?>">
  <br>
  State:
  <input type="text" name="state" value="<?php echo $_REQUEST["state"] ?>">
  <br>
  Zip Code:
  <input type="number" name="zip" value="<?php echo $_REQUEST["zip"] ?>">
  <br>
  Phone Number:
  <input type="tel" name="phone" value="<?php echo $_REQUEST["phone"] ?>">
  <br>
  Birth Date:
  <input type="date" name="birth_date" value="<?php echo $_REQUEST["birth_date"] ?>">
  <br>
  Sex:
  <select name="sex" required="required">
  <option selected="selected"><?php echo $_REQUEST["sex"] ?></option>
  <option value="F">Female</option>
  <option value="M">Male</option>
  </select>
  <br>
  <input type="hidden" name="client_id" value="<?php echo $_REQUEST["client_id"] ?>">
  <input type="submit" value="Submit">
</form>

<?php
require 'clientlist.php';
?>