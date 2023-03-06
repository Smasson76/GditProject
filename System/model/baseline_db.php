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
    $statement->closeCursor();
    return $client;   
}

function save_baseline($clientctrls) {
    global $db;
    foreach ($clientctrls as $value) {
        $sql = 'INSERT INTO savedbaselines (baseid, b_client_id, b_ctrl_id, b_ctrl_name, b_ctrl_impl)
                VALUES (NULL,'.$value['client_id'].','.$value['ctrl_id'].','.$value['ctrl_name'].','.$value['ctrl_select'].')';
        $statement = $db->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
     }

    
}

// function save_baseline($client_id, $ctrl_id, $ctrl_name, $ctrl_implement) {
//     global $db;

//     foreach ($arr as $value) {
//         $sql = "INSERT INTO videos (username, src, type, position)
//         VALUES ('admin', '".$value."', 'vide', '0')";
    
//         if ($conn->query($sql)) {
//            echo "New record created successfully";
//         } else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
//         }
//      }

//     $sql = 'INSERT INTO savedbaselines (baseid, b_client_id, b_ctrl_id, b_ctrl_name, b_ctrl_impl)
//                 VALUES (NULL, :clientid, :ctrlid, :ctrlname, :ctrlimp)';
//     $statement = $db->prepare($sql);
//     $statement->bindValue(':clientid',$client_id);
//     $statement->bindValue(':ctrlid',$ctrl_id);
//     $statement->bindValue(':ctrlname',$ctrl_name);
//     $statement->bindValue(':ctrlimp',$ctrl_implement);    
//     $statement->execute();
//     $statement->closeCursor();
// }

// function get_controls($framework, $impact) {
//     global $db;
    // $sql = 'SELECT * FROM ' . $framework . ' JOIN nistbaselines
    //             ON ' . $framework . '.ctrl_id=nistbaselines.ctrl_id
    //             WHERE nistbaselines.ctrl_base_' . $impact . '="x"';
//     $statement = $db->prepare($sql);
//     $statement->execute();
//     $controls = $statement->fetchAll();
//     $statement->closeCursor();
//     return $controls;
// }

// function initialize_baseline($framework, $impact) {
//     global $db;
//     $query = 'SELECT * FROM :framework JOIN nistbaselines
//                 ON :framework.ctrl_id=nistbaselines.ctrl_id
//                 WHERE nistbaselines.ctrl_base_:ctrl_base="x"';
//     $statement = $db->prepare($query);
//     $statement->bindValue(':framework', $framework);
//     $statement->bindValue(':ctrl_base', $impact);
//     $statement->execute();
//     $bl_data = $statement->fetchAll();
//     $statement->closeCursor();
//     return $bl_data;
// }

?>


