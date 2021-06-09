<?php
ob_start(); //Turns on output buffering
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agro";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>
