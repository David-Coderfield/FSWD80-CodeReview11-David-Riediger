<?php
session_start();
if (isset($_SESSION['role'])) {
  if ($_SESSION['role']==='admin') {

    require_once 'dbconnect.php';

    if(isset($_POST)){
      $id = $_POST['id'];

      $sql1 = "UPDATE `locations` SET `title`='{$_POST['title']}',`address`='{$_POST['address']}',`image`='{$_POST['image']}',`www`='{$_POST['www']}',`description`='{$_POST['description']}' WHERE `id`=$id;";
      echo "<code>$sql1</code> <br><br>";
      
      $sql2 = "UPDATE `sights` SET `type`='{$_POST['type']}' WHERE location_id=$id;";
      echo "<code>$sql2</code> <br><br>";

      if ($conn->query($sql1)) {
        echo '<b style="color:green">Table 1 Success!</b><br>';
      }
      else {
        echo '<b style="color:red">Error! Failed to execute query 1.</b><br><br>';
        echo '<a href="../index.php">go back</a><br><br>';
      }

      if ($conn->query($sql2)) {
        echo '<b style="color:green">Table 2 Success!</b>';
        header("refresh:3; url=../index.php");
      }
      else {
        echo '<b style="color:red">Error! Failed to execute query 2.</b><br>';
        echo '<a href="../index.php">Ok, got it!</a>';
      }

    }
  }
  else {header("location: ../index.php");}
}
else {header("location: ../index.php");}
?>