<?php
$db = mysqli_connect('localhost', 'root', '', 'health');
if ($db->connect_error) {
die("Connection failed: " . $db->connect_error);
}
//echo "success";
?>