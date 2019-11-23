<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'components/head.php' ?>
</head>

<body>
	<div class="container">
		<?php require_once 'components/nav.php' ?>
		<div class="row">
			<div class="col offset-md-6 col-md-6 offset-lg-8 col-lg-4">
		<form id="form" class="text-center my-3 mx-auto w-100 form-inline">
			<!-- <label for="searchbar"><i class="fas fa-search text-light"></i> </label> --> 
  		<input id="searchbar" class="form-control ml-2 w-100" name="searchbar" type="text" value="" placeholder="search... &#128269;">
		</form>
		</div>
		</div>
		<div class="row" id="content">
			<!-- content from sql query/ajax goes here -->
		</div>
	<?php require_once 'components/footer.php' ?>
	</div>
<script src="js/events-ajax.js"></script>
</body>
</html>