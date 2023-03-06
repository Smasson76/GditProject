<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../view/header.php'; 
include '../view/header-nav.php';

$client = get_client_id($client_id);
log_it($client);
$clientid = $client['clientID'];
?>
<script type="text/javascript">
    // when page is ready
    $(document).ready(function() {
         // on form submit
        $("#bline").on('submit', function() {
            // to each unchecked checkbox
            $(this).find('input[type=checkbox]:not(:checked)').prop('checked', true).val(0);
        })
    })
</script>
<main>
    <h2>Framework Control Selection for <?php echo $client['clientName'] ?></h2>
        <br><br>
        <table>
            <tr>
                <th>Select</th>
                <th>Control ID</th>
                <th>Control Name</th>
                <th>Low</th>
                <th>Moderate</th>
                <th>High</th>
            </tr>
            
            <form action="index.php" id="bline" method="post">   
            <input type="hidden" name="action" value="select_ctrl">       
            <?php $ctrl_col = "ctrl_base_".$impact;
            $i = 0;
            foreach($controls as $control) : ; ?>
            <tr><td>
                    <input type="hidden" <?php echo 'name="ctrlset['.$control['ctrl_id'].'][clientid]"'; ?> value="<?php echo $clientid; ?>">
                    <input type="hidden" <?php echo 'name="ctrlset['.$control['ctrl_id'].'][cid]"'; ?>
                                                                    value="<?php echo $control['ctrl_id']; ?>" >
                    <input type="hidden" <?php echo 'name="ctrlset['.$control['ctrl_id'].'][ctrlname]"'; ?> value="<?php echo $control['ctrl_name']; ?>">
                    <input type="hidden" <?php echo 'name="ctrlset['.$control['ctrl_id'].'][ctrlsel]"'; ?> value="off">
                    <input type="checkbox" <?php echo 'name="ctrlset['.$control['ctrl_id'].'][ctrlsel]"'; ?> 
                                            <?php if($control[$ctrl_col] == "x") { echo 'checked'; } ?>>
                    </td>
                    <td><?php echo $control['ctrl_id']; ?></td>
                    <td><?php echo $control['ctrl_name']; ?></td>
                    <td><?php echo $control['ctrl_base_low']; ?></td>
                    <td><?php echo $control['ctrl_base_mod']; ?></td>
                    <td><?php echo $control['ctrl_base_high']; ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
            <br><br>
            <input class="button primary pill" style="margin:0 auto;" type="submit" value="Implement Controls" />
            <br><br>
    </form>
</section> 

<?php include '../view/footer.php'; ?>