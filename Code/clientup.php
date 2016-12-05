<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
require 'dbconnect.php';
$sql = "update clients "; 
$sql .= "set first_name = '" . $_REQUEST["first_name"] . "',"; 
$sql .= "last_name = '" . $_REQUEST["last_name"] . "',";
$sql .= "email = '" . $_REQUEST["email"] . "',";
$sql .= "street = '" . $_REQUEST["street"] . "',";
$sql .= "city = '" . $_REQUEST["city"] . "',";
$sql .= "state = '" . $_REQUEST["state"] . "',";
$sql .= "zip = '" . $_REQUEST["zip"] . "',";
$sql .= "phone = '" . $_REQUEST["phone"] . "',";
$sql .= "birth_date = '" . $_REQUEST["birth_date"] . "',";
$sql .= "sex = '" . $_REQUEST["sex"] . "' ";
$sql .= "where client_id = " . $_REQUEST["client_id"];
 
if (!$result = $mysqli->query($sql)) {
    echo "Error: Query error, here is why: </br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}

?>

<script>
window.location = 'clientlist.php';
</script>