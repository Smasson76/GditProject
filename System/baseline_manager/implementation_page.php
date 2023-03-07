<?php

include '../view/header.php'; 
include '../view/header-nav.php';

$client = get_client_id($clientid);
$clientid = $client['clientID'];
?>

<main>

    <h2><?php echo $client['clientName']; ?> Implementation</h2>
    <br><br>
    <table class="ctrl-select">
        <tr>
            <th class="cenx">ID</th>
            <th class="cenx">Status</th>
            <th class="cenx">Description</th>
            <th class="cenx">Comments</th>
        </tr>
        
        <form action="index.php" id="bline" method="post">   
            <input type="hidden" name="action" value="implementation">       
            <?php foreach($controls as $control) : ?>
            <tr>
                <td><?php echo $control['b_ctrl_id']; ?></td>
                <td>
                <select name="status" id="status">
                    <option value="Implemented">Implemented</option>
                    <option value="Not_Applicable">Not Applicable</option>
                    <option value="In_Progress">In Progress</option>
                </select>
                </td>
                <td style="font-size: 10pt;"><?php echo $control['ctrl_desc']; ?></td>
                <td><textarea id="textarea" rows="3" cols="20"> </textarea>

                </td>
            </tr>
            <?php endforeach; ?>
    </table>

</section>
<?php include '../view/footer.php'; ?>