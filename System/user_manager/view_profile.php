<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../view/header.php'; 
    
?>
<main>
    <nav>
    <ul>
        <h2>Welcome <?php echo $_SESSION['user']['user_fname'] ?>, </h2><br>
        <li><a href="">View Profile</a></li>
        <li><a href="">Account Management</a></li>
        <li><a href="">Start Baseline</a></li>
        <li><a href="">View Documents</a></li>
    </ul>    
    </nav>
</section>
<?php include '../view/footer.php'; ?>