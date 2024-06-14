<?php
$servername = "localhost";
$username = "anandaca_admin";
$password = "Anurag@2002";
$dbname = "anandaca_task";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

return $conn;
?>
