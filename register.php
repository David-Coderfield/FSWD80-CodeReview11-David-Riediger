<?php
session_start();
//REDIRECT IF LOGGED IN USER REACHES THIS PAGE
	if (isset($_SESSION['user'])) {
  	header( "Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'components/head.php' ?>
</head>

<body>
  <div class="container">
    <?php require_once 'components/nav.php' ?>
    <div class="signupform p-4 my-5">
      <form id="form">
        <!-- error message -->
        <p id="errMsg"></p>
        <h2>Sign Up</h2><br>
        <p><label for="user">Username</label><span class="text-danger" id="userError"></span></p>
        <input type="text" name="user" class="form-control w-100" value="<?php if (isset($user)) echo $user; ?>"> <br>
        <p>
        	<label for="user">E-Mail</label>
        	<span class="text-danger" id="emailError"></span>
        </p>
        <input type="text" name="email" class="form-control w-100" value="<?php if (isset($email)) echo $email; ?>"><br>
        <p>
        	<label for="user">Password</label>
        <span class="text-danger" id="pass1Error"></span></p>
        <input type="password" name="pass1" class="form-control w-100"><br>
        <p>
        	<label for="user">Repeat Password</label>
        	<span class="text-danger" id="pass2Error"></span>
        </p>
        <input type="password" name="pass2" class="form-control w-100">
        <hr>
        <input type="submit" id="submit" class="btn btn-primary" value="Register">
      </form>
    </div>
    <?php require_once 'components/footer.php' ?>
  </div>
  <script src="js/register.js"></script>
</body>

</html>