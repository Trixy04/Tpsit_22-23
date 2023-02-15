<?php
$servername = "mio_db";
$username = "root";
$password = "teriaca";
$db = "cineteca_es_12";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>