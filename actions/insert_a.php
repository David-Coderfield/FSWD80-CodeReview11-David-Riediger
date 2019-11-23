<?php
session_start();
if (isset($_SESSION['role'])) {
	if ($_SESSION['role']==='admin' && isset($_POST['tablename'])) {

		require_once('dbconnect.php');
		$error = false;
		$table = $_POST['tablename'];

		//LOCATIONS QUERY
		$sql1 = "INSERT INTO `locations`(`title`, `address`, `image`, `www`, `description`) VALUES ('{$_POST['title']}','{$_POST['address']}','{$_POST['image']}','{$_POST['www']}','{$_POST['description']}');";

		echo "<code>$sql1</code><br>";

		//ERROR/SUCCESS 1
		if ($conn->query($sql1)) {
			echo '<b style="color:green">Success! Inserted 1 row into locations.</b><br><br>';
		}
		else {
			echo '<b style="color:red">Error! Failed to execute query.</b><br><br>';
			$error = true;
		}

		// RETRIEVE NEWEST PRIMARY KEY TO USE IT AS FOREIGN KEY (must be MAX(id) with auto_increment!)
		$sql2 = "SELECT MAX(id) FROM locations;";
		$result = $conn->query($sql2);
		$row = mysqli_fetch_assoc($result);
		$fk = $row['MAX(id)'];

		echo "<b><code>TABLE = $table, FOREIGN KEY = $fk</code></b><br><br>";

		// CHOOSE 2ND TABLE/QUERY
		if ($table == 'sights') {
			$sql3 = "INSERT INTO `sights`(`location_id`, `type`) VALUES ($fk, '{$_POST['type']}');";
		}
		else if ($table == 'concerts') {
			$sql3 = "INSERT INTO `concerts` (`location_id`, `date`, `time`, `ticket`) VALUES ($fk,'{$_POST['date']}','{$_POST['time']}',{$_POST['ticket']});";
		}
		else if ($table == 'restaurants') {
			$sql3 = "INSERT INTO `restaurants` (`location_id`, `kitchen`, `phone`) VALUES ($fk,'{$_POST['kitchen']}','{$_POST['phone']}');";
		}
		else {
			$error = true;
			echo '<b style="color:red">Error! Unknown table.</b><br>';
		}

		echo "<code>$sql3</code><br>";

		//ERROR/SUCCESS 2
		if ($conn->query($sql3)) {
			echo "<b style='color:green'>Success! Inserted 1 row into $table</b><br>";
		}
		else {
			echo '<b style="color:red">Error! Failed to execute query.</b><br>';
			$error = true;
		}

		$conn->close();

		if ($error) {
			echo '<a href="index.php>Ok, got it</a>';
		}
		else {header("refresh:4; url=../index.php");}
	}
	else {header("location: ../index.php");}
}
else {header("location: ../index.php");}
?>