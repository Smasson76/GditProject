<?php include '../view/header.php'; 


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['authuser'] =  $user;

?>
<main>
    <nav>
    <ul>
        <h2>Welcome <?php echo $user; ?>, </h2><br>

        <li><a href="">View Profile</a></li>
        <li><a href="">Account Management</a></li>
        <li><a href="start_baseline.php">Start Baseline</a></li>
        <li><a href="">View Documents</a></li>
    </ul>    
    </nav>
</section>
<?php include '../view/footer.php'; ?>