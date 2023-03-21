<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../view/header.php'; 
include '../view/header-nav.php';
    
?>

<main>
<section id="client-info-section">
<h2>Edit Client Information</h2>
<br><br>
    <form class="general-form" action="index.php" method="post" id="view_client_form">
        <input type="hidden" name="action" value="update_client">

        <label>ID: <?php echo $client_id ?></label>
        <input type="hidden" name="client_id" value="<?php echo $client_id ?>"/>
        <br><br>

        <label>Name:</label>
        <input type="text" name="client_name" value="<?php echo $client_name ?>"/>
        <br><br>

        <label>Alias:</label>
        <input type="text" name="client_alias" value="<?php echo $client_alias ?>"/>
        <br><br>

        <label>Email:</label>
        <input type="text" name="client_email" value="<?php echo $client_email ?>"/>
        <br><br>

        <label>&nbsp;</label>
        <input class="button secondary pill" type="submit" value="Update Information" />
        <br>
</section>
</form>

    <section id="client-baseline-section">
    <h1>Clients Baselines</h1>
        <!-- display a table of clients -->
        <table>
            <tr>
                <th>ID</th>
                <th>Created</th>
                <th>Modified</th>
            </tr>
            <?php foreach ($baselines as $baseline) : ?>
            <tr>
                <td><?php echo $baseline['bl_ctrl_id']; ?></td>
                <td><?php echo $baseline['bl_created']; ?></td>
                <td><?php echo $baseline['bl_modified']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="update_client">
                    <input type="hidden" name="client_id" value="<?php echo $baseline['bl_id']; ?>">  
                </form></td>   
            </tr>
            <?php endforeach; ?>
        </table>
        </p>             
    </section>
</main>
<?php include '../view/footer.php'; ?>