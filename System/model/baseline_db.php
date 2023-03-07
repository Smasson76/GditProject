<?php

function get_controls($framework, $impact, $hide) {
    global $db;
    if($hide == FALSE) {
        $sql = 'SELECT * FROM ' . $framework . ' JOIN nistbaselines
                ON ' . $framework . '.ctrl_id=nistbaselines.ctrl_id';
    } else {
        $sql = 'SELECT * FROM ' . $framework . ' JOIN nistbaselines
                ON ' . $framework . '.ctrl_id=nistbaselines.ctrl_id WHERE ctrl_base_'
                . $impact .'=\'x\' OR ctrl_base_low = \'\' AND ctrl_base_mod = \'\' AND ctrl_base_high = \'\'';
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
    $sql = 'SELECT * FROM clients WHERE clientID = :clientid';
    $statement = $db->prepare($sql);
    $statement->bindValue(':clientid', $id);
    $statement->execute();
    $client = $statement->fetch();
    $GLOBALS['curr_client'] = $client;
    $statement->closeCursor();
    return $client;   
}

function save_baseline($clientctrls) {
    $link = mysqli_connect('localhost', 'ts_user', 'pa55word', 'gdit_system');
    foreach ($clientctrls as $row) {
        $cli_id = $row['clientid'];
        $ct_id = $row['cid'];
        $ct_nm = $row['ctrlname'];
        $ct_sel = $row['ctrlsel'];

        $sql = "INSERT INTO savedbaselines (baseid, b_client_id, b_ctrl_id, b_ctrl_name, b_ctrl_impl)
        VALUES (NULL,'$cli_id','$ct_id','$ct_nm','$ct_sel')";
        mysqli_query($link, $sql);
    }
}

function get_saved_baseline($clientid) {
    global $db;
    $sql = 'SELECT sb.baseid, sb.b_ctrl_id, nio.ctrl_desc
            FROM savedbaselines sb JOIN nist80053oscal nio ON sb.b_ctrl_id=nio.ctrl_id
            WHERE sb.b_client_id = :clientid';
    $statement = $db->prepare($sql);
    $statement->bindValue(':clientid', $clientid);
    $statement->execute();
    $baselines = $statement->fetchAll();
    $statement->closeCursor();
    return $baselines;  
}



?>


