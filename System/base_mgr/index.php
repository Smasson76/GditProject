<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require('../model/database.php');
require('../model/users_db.php');
require('../model/baseline_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'start_baseline';
    }
}

if ($action == 'start_baseline') {
    include('start_baseline.php');
} else if ($action == 'select_framework') {
    $framework = filter_input(INPUT_POST, 'framework_id');
    $impact = filter_input(INPUT_POST, 'impact');
    if ($framework == NULL || $framework == FALSE ||
        $impact == NULL || $impact == FALSE) {
        $error = "Missing or incorrect framework or impact level.";
        include('../errors/error.php');
    } else { 
        $controls = get_controls($framework, $impact);
        include('ctrl_select.php');
    }
}


?>