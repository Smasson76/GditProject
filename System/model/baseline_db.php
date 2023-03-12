<?php

function get_controls($framework, $impact, $hide) {
    global $db;
    if($hide == FALSE) {
        $sql = 'SELECT * FROM ' . $framework . ' JOIN nistbaselines
                ON ' . $framework . '.ctrl_id=nistbaselines.ctrl_id LIMIT 50';
    } else {
        $sql = 'SELECT * FROM ' . $framework . ' JOIN nistbaselines
                ON ' . $framework . '.ctrl_id=nistbaselines.ctrl_id WHERE ctrl_base_'
                . $impact .'=\'x\' OR ctrl_base_low = \'\' AND ctrl_base_mod = \'\' AND ctrl_base_high = \'\'  LIMIT 50';
    }
    $statement = $db->prepare($sql);
    $statement->execute();
    $controls = $statement->fetchAll();
    $statement->closeCursor();
    return $controls;
}

function get_clients() {
    global $db;
    $sql = 'SELECT * FROM clients';
    $statement = $db->prepare($sql);
    $statement->execute();
    $clients = $statement->fetchAll();
    $statement->closeCursor();
    return $clients;   
}

function get_client_id($id) {
    global $db;
    $sql = 'SELECT * FROM clients WHERE cl_id = :clientid';
    $statement = $db->prepare($sql);
    $statement->bindValue(':clientid', $id);
    $statement->execute();
    $client = $statement->fetch();
    $GLOBALS['curr_client'] = $client;
    $statement->closeCursor();
    return $client;   
}

function save_baseline($clientctrls) {
    global $link;
    foreach ($clientctrls as $row) {
        $cli_id = $row['clientid'];
        $ct_id = $row['cid'];
        $ct_nm = $row['ctrlname'];
        $ct_sel = $row['ctrlsel'];

        $sql = "INSERT INTO savedbaselines (bl_id, bl_cl_id, bl_ctrl_id, bl_ctrl_name, bl_ctrl_stat)
        VALUES (NULL,'$cli_id','$ct_id','$ct_nm','$ct_sel')";
        mysqli_query($link, $sql);
    }
}

function get_saved_baseline($clientid) {
    global $db;
    $sql = 'SELECT sb.bl_id, sb.bl_ctrl_id, nio.ctrl_desc
            FROM savedbaselines sb JOIN nist80053oscal nio ON sb.bl_ctrl_id=nio.ctrl_id
            WHERE sb.bl_cl_id = :clientid LIMIT 25';
    $statement = $db->prepare($sql);
    $statement->bindValue(':clientid', $clientid);
    $statement->execute();
    $baselines = $statement->fetchAll();
    $statement->closeCursor();
    return $baselines;  
}

function get_saved_baseline_for_client($clientid) {
    global $db;
    $sql = 'SELECT *
            FROM savedbaselines
            WHERE sb.bl_cl_id = :clientid LIMIT 25';
    $statement = $db->prepare($sql);
    $statement->bindValue(':clientid', $clientid);
    $statement->execute();
    $baselines = $statement->fetchAll();
    $statement->closeCursor();
    return $baselines;  
}

?>