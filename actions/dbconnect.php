<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cr11_riediger_travelmatic";
$conn = @new mysqli($servername, $username, $password, $dbname);
if(!$conn) {
	die("Connection failed: " . $conn->connect_error);
}
?>