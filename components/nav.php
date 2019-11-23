<?php 
if(!isset($_SESSION['userId'])) {
  $loginBtn = '<a href="login.php" class="btn btn-secondary my-2 my-sm-0 ml-1" type="submit"><i class="fas fa-sign-in-alt"></i> Login</a>';
  $signupBtn = '<a href="register.php" class="btn btn-secondary my-2 my-sm-0 mr-1" type="submit"><i class="fas fa-user"></i> Sign Up</a>';
}
else {
  $loginBtn = '<a href="login.php?logout=true" class="btn btn-secondary my-2 my-sm-0 ml-1"><i class="fas fa-sign-out-alt"></i> Logout</a>';
  $signupBtn = '<a class="nav-link text-dark" href="profile.php"><i class="fas fa-user"></i> Hi, ' . $_SESSION['userName'] . '</a>';
}

$adminlink = '';
if(isset($_SESSION['role'])) {
  if ($_SESSION['role']=='admin') {$adminlink = '<a class="nav-link text-warning" href=adminpanel.php><i class="fas fa-wrench"></i> Adminpanel</a>'; }
}

echo '
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><i class="fas fa-compass"></i> Travelstar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="events.php">Events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="restaurants.php">Restaurants</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Placeholder</a>
          <a class="dropdown-item" href="#">Another placeholder</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Yet another placeholder</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">'
    . $adminlink . $signupBtn . $loginBtn .
    '</form>
  </div>
</nav>'
?>
