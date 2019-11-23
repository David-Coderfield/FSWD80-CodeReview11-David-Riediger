<?php

function cleanString($s) {
  $s=strip_tags($s);
  $s=htmlspecialchars($s);
  $s=trim($s);
  return $s;
}

require_once 'dbconnect.php';

$obj = ['userError'=>'', 'emailError'=>'', 'pass1Error'=>'', 'pass2Error'=>'', 'errMsg'=>''];

$error = false;
 
  // sanitize user input to prevent sql injection
  $user = cleanString($_POST['user']);
  $email = cleanString($_POST[ 'email']);
  $pass1 = cleanString($_POST['pass1']);
  $pass2 = cleanString($_POST['pass2']);

  // basic name validation
  if (!$user) {
  $error = true ;
  $obj['userError'] = ' &rarr; Please enter your full name!';
  }
  else if (strlen($user) < 2) {
  $error = true;
  $obj['userError'] = ' &rarr; Name must have at least 2 characters!';
  }
  else if (!preg_match("/^[a-zA-Z0-9 ]+$/",$user)) {
  $error = true ;
  $obj['userError'] = ' &rarr; Name can only contain letters and spaces!';
  }

  //basic email validation
  if (!filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $obj['emailError'] = ' &rarr; Please enter valid email address!' ;
  }
  else {
  // checks whether the email exists or not
  $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result)){ //if num_rows != 0
    $error = true;
    $obj['emailError'] = ' &rarr; Provided Email is already in use!';
  }
}
 // password validation
if (!$pass1){
  $error = true;
  $obj['pass1Error'] = ' &rarr; Please enter password!';
 }
else if(strlen($pass1) < 4) {
  $error = true;
  $obj['pass1Error'] = ' &rarr; Password must have atleast 4 characters!';
 }

 // password repeat
  if ($pass1 != $pass2) {
    $error = true;
    $obj['pass2Error'] = ' &rarr; Passwords are not matching!';
  } 

 // password hashing for security
$hashedPass = hash('sha256' , $pass1);


 // if there's no error, continue to signup
if( !$error ) {
  $query = "INSERT INTO users(`userName`,`userEmail`,`userPass`) VALUES ('$user','$email','$hashedPass')";
  $res = mysqli_query($conn, $query);
 
  if ($res) {
   $obj['errMsg'] = "<p class='bg-success text-light p-3'>Successfully registered, you may login now.</p>";
  unset($user);
  unset($email);
  unset($pass1);
  unset($pass2);
  }
}
if ($error || !$res) $obj['errMsg'] = '<p class="bg-danger text-light p-3">Something went wrong, please try again.</p>';

$json = json_encode($obj);

echo $json;
?>