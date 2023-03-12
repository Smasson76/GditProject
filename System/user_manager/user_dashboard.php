<?php  
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../view/header.php';
include '../view/header-nav.php';
?>
<main>
    <nav>
    <ul>
        <h2>Welcome <?php echo $_SESSION['user']['user_fname'] ?>, </h2><br>
        <li><a href="view_profile.php">View Profile</a></li>
        <li><a href="../account_manager">Account Management</a></li>
        <li><a href="../baseline_manager">Start Baseline</a></li>
        <li><a href="">View Documents</a></li>
    </ul> 
    </ul>    
    </nav>
</section>
<?php include '../view/footer.php'; ?>