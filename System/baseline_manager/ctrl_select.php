<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../view/header.php'; 
include '../view/header-nav.php';

$client = get_client_id($client_id);
log_it($client);
$clientid = $client['clientID'];
?>

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
            
            <form action="index.php" method="post">   
            <input type="hidden" name="action" value="select_ctrl">       
            <?php $ctrl_col = "ctrl_base_".$impact;
            foreach($controls as $control) : ?>
            <tr><td>
                    <input type="hidden" name="clientctrl[client_id]" value="<?php echo $clientid; ?>">
                    <input type="hidden" name="clientctrl[ctrl_id]" value="<?php echo $control['ctrl_id']; ?>">
                    <input type="hidden" name="clientctrl[ctrl_name]" value="<?php echo $control['ctrl_name']; ?>">
                    <input type="checkbox" name="clientctrl[ctrl_select]" <?php if($control[$ctrl_col] == "x") { 
                                                                        $check = 'checked';
                                                                    } else { 
                                                                        $check = '';
                                                                    }  echo $check; ?> value="<?php echo $check;?>" >
                    </td>
                    <td><?php echo $control['ctrl_id']; ?></td>
                    <td><?php echo $control['ctrl_name']; ?></td>
                    <td><?php echo $control['ctrl_base_low']; ?></td>
                    <td><?php echo $control['ctrl_base_mod']; ?></td>
                    <td><?php echo $control['ctrl_base_high']; ?></td>
                </tr>
            <?php endforeach; ?>
            <input class="block" type="submit" value="Implement Controls" />
        </table>
    </form>
</section> 
<?php include '../view/footer.php'; ?>