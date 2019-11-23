<?php
session_start();
if (isset($_SESSION['role'])) {
	if ($_SESSION['role']==='admin' && isset($_GET['id'])) {
		$id = $_GET['id'];
		require_once 'dbconnect.php';

		$sql1 = "DELETE FROM `locations` WHERE id=$id";
		$sql2 = "DELETE FROM `sights` WHERE location_id=$id";
		$sql3 = "DELETE FROM `concerts` WHERE location_id=$id";
		$sql4 = "DELETE FROM `restaurants` WHERE location_id=$id";

		$conn->query($sql2);
		$conn->query($sql3);
		$conn->query($sql4);
		$conn->query($sql1); //has to be in last because foreign key restrain must be solved first

		$conn->close();

		//to do: err conditions
		echo '<b>SUCCESS!</b><br><br>Deleted 1 record from 2 tables.';

		header("refresh:1; url=../index.php");
	}
	else {header("location: ../index.php");}
}
else {header("location: ../index.php");}


