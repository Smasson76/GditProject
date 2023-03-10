<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../view/header.php'; 
include '../view/header-nav.php';
    
?>
<main>
<h2>Edit Contact Information</h2>
<br><br>
    <form class="general-form" action="index.php" method="post" id="view_user_form">
        <input type="hidden" name="action" value="update_user">

        <label>ID: <?php echo $_SESSION['user']['u_alias'] ?></label>
        <input type="hidden" name="username" value="<?php echo $_SESSION['user']['u_alias'] ?>"/>
        <br><br>

        <label>First Name: <?php echo $_SESSION['user']['user_fname'] ?></label>
        <input type="hidden" name="firstName" value="<?php echo $_SESSION['user']['user_fname'] ?>"/>
        <br><br>
        
        <label>Last Name: <?php echo $_SESSION['user']['user_lname'] ?></label>
        <input type="hidden" name="lastName" value="<?php echo $_SESSION['user']['user_lname'] ?>"/>
        <br><br>

        <label>Email: </label>
        <input type="text" name="email" value="<?php echo $_SESSION['user']['user_email'] ?>"/>
        <br><br>

        <label>Phone: </label>
        <input type="text" name="phone" value="<?php echo $_SESSION['user']['user_phone'] ?>"/>
        <br><br>

        <label>Address: </label>
        <input type="text" name="address" value="<?php echo $_SESSION['user']['user_address'] ?>"/>
        <br><br>

        <label>Password: </label>
        <input type="password" name="password" value=""/>
        <br><br>

        <label>&nbsp;</label>
        <input class="button secondary pill" type="submit" value="Update Information" />
        <br>
    </form>
</section>
<?php include '../view/footer.php'; ?>

