<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../view/header.php'; 
include '../view/header-nav.php';


?>

<main>
<h1>Client List</h1>
    <section>
        <!-- display a table of clients -->
        <table>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($clients as $client) : ?>
            <tr>
                <td><?php echo $client['cl_name']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="select_client">
                    <input type="hidden" name="client_id" value="<?php echo $client['cl_name']; ?>">
                    <input type="submit" value="Select">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        </p>             
    </section>
</main>
<?php include '../view/footer.php'; ?>