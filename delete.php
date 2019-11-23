<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'components/head.php' ?>
</head>

<body style="background-color:#ccc">
	<div class="text-center v-center">
		<?php 
			if (isset($_GET['id']) && $_SESSION['role']==='admin') {
				echo '<h3 class="text-danger">WARNING!</h3>
							<p class="text-danger">You are about to delete all data about this item from all connected tables.</p>' .
							"<a class='btn btn-primary' href=actions/delete_a.php?id={$_GET['id']}>Proceed</a>  <a class='btn btn-secondary' href='index.php'>Go back</a>";
}
else {
	header('Location: index.php');
}
?>
	</div>
</body>
</html>
