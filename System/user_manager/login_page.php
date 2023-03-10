<?php include ('../view/header.php');?>
<main>
<div class="split left brand">
  <div class="centered">
  <?php include ('view/logo-w.php');?>

  </div>
</div>

<div class="split right">
  <div class="centered">
    <form class="login-form" action="index.php" method="post" id="login_form">
        <input type="hidden" name="action" value="login">

        <label class="sr-only">Username:</label>
        <input type="text" name="username" placeholder="username"/>
        <br>

        <label class="sr-only">Password:</label>
        <input type="password" name="password" placeholder="password" />
        <br>
        <br>
        
        <input class="button primary pill" type="submit" value="Login" />
        <br><br>
    </form>
  </div>
</div>
</section>
