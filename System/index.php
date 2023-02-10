<?php include 'view/header.php'; 
require('model/database.php');
require('model/users_db.php');

$action = filter_input(INPUT_POST, 'action');

if ($action == 'login') {
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');
  if ($username == NULL || $username == FALSE || $password == NULL || $password == FALSE) {
      $error = "Invalid data. Check all fields and try again.";
      include('errors/error.php');
  } else { 
      $user = get_user($username, $password);
      include('user_manager');
  }
}
?>


<main>
<div class="split left">
  <div class="centered">
    <img src="https://mma.prnewswire.com/media/1769533/General_Dynamics_Information_Technology_Logo.jpg?p=facebook" alt="GDIT Logo">
  </div>
</div>

<div class="split right">
  <div class="centered">
  <h1>Log in</h1>
    <form action="index.php" method="post" id="login_form">
        <input type="hidden" name="action" value="login">

        <label>Username:</label>
        <input type="text" name="username" />
        <br>

        <label>Password:</label>
        <input type="password" name="password" />
        <br>
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Login" />
        <!--<li><a href="user_manager">Display Incidents</a></li> -->
        <br><br>
    </form>
  </div>
</div>
</section>
<?php include 'view/footer.php'; ?>