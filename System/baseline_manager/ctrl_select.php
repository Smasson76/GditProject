<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../view/header.php'; 
include '../view/header-nav.php';

?>

<main>

    <h2>Framework Control Selection</h2>
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
            <?php foreach($controls as $control) : 
                    if($control['ctrl_base_low'] == "x" || $control['ctrl_base_mod'] == "x" || $control['ctrl_base_high'] == "x") { 
                        $check = 'checked';
                    } else { 
                        $check = '';
                    } ?>
                <tr>
                    <td><form action="." method="post">
                        <input type="hidden" name="action"
                            value="select_ctrl">
                        <input type="hidden" name="ctrl_id"
                            value="<?php echo $control['ctrl_id']; ?>">
                        <input type="hidden" name="ctrl_name"
                            value="<?php echo $control['ctrl_name']; ?>">
                        <input type="checkbox" value="Select" <?php echo $check; ?>>
                    </form></td>
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