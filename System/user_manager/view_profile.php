<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../view/header.php'; 
    
?>
<main>
<h1>Edit Contact Information</h1>
    <form action="index.php" method="post" id="view_user_form">
        <input type="hidden" name="action" value="update_user">

        <label></label>
        <input type="hidden" name="userID" value=""/>
        <br>

        <label>First Name:</label>
        <input type="text" name="firstName" value="<?php echo $_SESSION['user']['user_fname'] ?>"/>
        <br><br>
        
        <label>Last Name:</label>
        <input type="text" name="firstName" value="<?php echo $_SESSION['user']['user_lname'] ?>"/>
        <br>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Information" />
        <br>
    </form>
</section>
<?php include '../view/footer.php'; ?>

