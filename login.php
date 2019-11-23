<?php
session_start();
require_once 'actions/dbconnect.php';

//LOGOUT IF url?logout
if (isset($_GET['logout'])) {
 unset($_SESSION['userId']);
 unset($_SESSION['userName']);
 unset($_SESSION['userEmail']);
 unset($_SESSION['role']);
 session_unset();
 session_destroy();
 session_start();
}

//REDIRECT IF LOGGED IN USER REACHES THIS PAGE AND NOT ?logout
if (isset($_SESSION['user'])) {
 header( "Location: index.php");
}


##LOGIN SYSTEM
# clean strings from SQL injection
function cleanString($s) {
	$s=strip_tags($s);
	$s=htmlspecialchars($s);
	$s=trim($s);
	return $s;
}

$error = false;
$errMSG='';
$userError='';
$passError='';

if(isset($_POST['btn-login']) ) {
	$user = cleanString($_POST['user']);
	$pass = cleanString($_POST['pass']);

	if (!$user) {
		$error = true;
		$userError = " &rarr; Please enter your e-mail or username!";
	}

	else if (!$pass) {
		$error = true;
		$passError = " &rarr; Please enter your password!" ;
    echo $passError;
	}

	if (!$error) {
 
  $password = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$user' OR userName='$user'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
 
  if($row['userPass' ]==$password ) {
   $_SESSION['userId'] = $row['userId'];
   $_SESSION['userName'] = $row['userName'];
   $_SESSION['userEmail'] = $row['userEmail'];
   $_SESSION['role'] = $row['role'];
   header( "Location: index.php");
  } else
  {
   $errMSG = "<p class='bg-danger text-light p-3 my-3'>Incorrect Credentials, Try again...</p>";
  }
 
 }


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
    <div class="loginform p-4 my-5">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" accept-charset="utf-8">
        <h2>Sign In</h2><br>
        <?php if(isset($errMSG)) {echo $errMSG;} ?>
        <p>
          <label for="user">Username or E-Mail</label>
          <span class="text-danger"><?= $userError ?></span>
        </p>
        <input type="text" name="user" class="form-control w-100" value="<?php if(isset($user)) echo $user ?>"><br>
        <p>
          <label for="user">Password</label>
          <span class="text-danger"><?= $passError ?></span>
        </p>
        <input type="password" name="pass" class="form-control w-100">
        <hr>
        <input type="submit" name="btn-login" class="btn btn-primary" value="SIGN IN">
      </form>
    </div>
    <?php require_once 'components/footer.php' ?>
  </div>
</body>

</html>