<?php include 'view/header.php'; ?>
<main>
<div class="split left">
  <div class="centered">
    <img src="https://mma.prnewswire.com/media/1769533/General_Dynamics_Information_Technology_Logo.jpg?p=facebook" alt="GDIT Logo">
  </div>
</div>

<div class="split right">
  <div class="centered">
  <h1>Log in</h1>
    <form action="index.php" method="post" id="add_technician_form">
        <input type="hidden" name="action" value="add_technician">

        <label>Username:</label>
        <input type="text" name="username" />
        <br>

        <label>Password:</label>
        <input type="password" name="password" />
        <br>
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Login" />
        <br><br>
    </form>
  </div>
</div>
</section>
<?php include 'view/footer.php'; ?>