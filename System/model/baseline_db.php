<?php

// Get the selected user
// function get_user($username) {
//     global $db;
//     $query = 'SELECT firstName FROM users
//               WHERE username = :username';
//     $statement = $db->prepare($query);
//     $statement->bindValue(':username', $username);
//     $statement->execute();
//     $userdata = $statement->fetch();
//     $statement->closeCursor();
//     return $userdata['username'];
// }

// function get_nist_baseline($baseline) {
//     global $db;
//     $query = 'SELECT * FROM nist80053oscal  
//                 JOIN nistbaselines ON nist80053oscal.ctrl_id=nistbaselines.ctrl_id 
//                 WHERE nistbaselines.:ctrl_base="x"';
//     $statement = $db->prepare($query);
//     $statement->bindValue(':ctrl_base', $baseline);
//     $statement->execute();
//     $bl_data = $statement->fetchAll();
//     $statement->closeCursor();
//     return $bl_data;
// }

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

function save_baseline() {
    global $db;
    $query = '';
    $statement = $db->prepare($sql);
    $statement->execute();
    $controls = $statement->fetchAll();
    $statement->closeCursor();
    return $controls;
}


?>