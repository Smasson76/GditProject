<?php

include '../view/header.php'; 
include '../view/header-nav.php';

$client = get_client_id($clientid);
$clientid = $client['cl_id'];
?>

<main>

    <h2><?php echo $client['cl_name']; ?> Implementation</h2>
    <br><br>
    <table class="ctrl-select">
        <tr>
            <th class="cenx">ID</th>
            <th class="cenx">Status</th>
            <th class="cenx">Name</th>
            <th class="cenx">Date Created</th>
            <th class="cenx">Comments</th>
        </tr>
        
        <form action="index.php" id="bline" method="post">   
            <input type="hidden" name="action" value="save_imp">  
            <input type="hidden" name="clientid" value="<?php echo $clientid; ?>">        
            <?php foreach($controls as $control) : ?>
            <tr>
                <td>
                <input type="hidden" <?php echo 'name="savebl['.$control['bl_ctrl_id'].'][bl_ctrl_id]"'; ?> value="<?php echo $control['bl_ctrl_id']; ?>">
                <input type="hidden" <?php echo 'name="savebl['.$control['bl_ctrl_id'].'][bl_cl_id]"'; ?> value="<?php echo $clientid; ?>">
                <input type="hidden" <?php echo 'name="savebl['.$control['bl_ctrl_id'].'][bl_created]"'; ?> value="<?php echo $control['bl_created']; ?>">
                    <?php echo $control['bl_ctrl_id']; ?>
                </td>
                <td>
                <select <?php echo 'name="savebl['.$control['bl_ctrl_id'].'][bl_stat]"'; ?> id="status">
                    <?php 
                        if ($control['bl_stat'] == "In_Progress") {
                            echo '<option value="Implemented">Implemented</option>';
                            echo '<option value="Not_Applicable">Not Applicable</option>';
                            echo '<option value="In_Progress" selected>In Progress</option>';
                        } else if ($control['bl_stat'] == "Implemented") {
                            echo '<option value="Implemented" selected>Implemented</option>';
                            echo '<option value="Not_Applicable">Not Applicable</option>';
                            echo '<option value="In_Progress">In Progress</option>';
                        } else {
                            echo '<option value="Implemented">Implemented</option>';
                            echo '<option value="Not_Applicable" selected>Not Applicable</option>';
                            echo '<option value="In_Progress">In Progress</option>';                           
                        }
                    ?>
                </select>
                </td>
                <td style="font-size: 10pt;"><?php echo $control['ctrl_name']; ?></td>
                <td style="font-size: 10pt;"><?php echo $control['bl_created']; ?></td>
                <td><textarea <?php echo 'name="savebl['.$control['bl_ctrl_id'].'][bl_comments]"'; ?> id="textarea" rows="3" cols="20"></textarea>

                </td>
            </tr>
            <?php endforeach; ?>
    </table>
    <br><br>
        <input class="button primary pill" style="margin:0 auto;" type="submit" value="Save" />
    <br><br>
</section>
<?php include '../view/footer.php'; ?>