<?php

include '../view/header.php'; 
include '../view/header-nav.php';

?>

<main>

    <h2>Framework Control Selection</h2>

    <table>
        <tr>
            <th>Control ID</th>
            <th>Implementation Status</th>
            <th>Control Organization</th>
            <th>Comments</th>
        </tr>
        
        <form action="index.php" id="bline" method="post">   
            <input type="hidden" name="action" value="implementation">       
            <?php foreach($controls as $control) : ?>
            <tr><td>
                <?php echo $control['ctrl_id']; ?>
            </td></tr>
            <?php endforeach; ?>
    </table>

</section>
<?php include '../view/footer.php'; ?>