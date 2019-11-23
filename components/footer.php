<?php
if(!isset($_SESSION['userId'])) {
  $footerLogin = '<a href="login.php"><i class="fas fa-sign-in-alt"></i> LOGIN</a>';
}
else {
  $footerLogin = '<a href="login.php?logout=true"><i class="fas fa-sign-out-alt"></i> Logout</a>';
}
echo '
<div class="text-right">
	<p class="">Photo by Josh Hild from Pexels</p>
</div>
<footer>
	<div class="bottomnav p-4">
		<a href="index.php">Home</a> | 
		<a href="events.php">Events</a> | 
		<a href="restaurants.php">Restaurants</a> | '
		. $footerLogin .
	'</div>
	<h5 class="pt-2 pb-5 text-center">&#0169; David Riediger / CodeFactory</h5>
</footer>
'

?>