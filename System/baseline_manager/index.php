<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require('../model/database.php');
require('../model/users_db.php');
require('../model/baseline_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'start_baseline';
    }
}

if ($action == 'start_baseline') {
    // Pull clients for Select
    $clients = get_clients();
    include('start_baseline.php');
} else if ($action == 'select_framework') {
    $client_id = filter_input(INPUT_POST, 'client_id');
    $framework = filter_input(INPUT_POST, 'framework_id');
    $impact = filter_input(INPUT_POST, 'impact');

    if (isset($_POST['hide_unselected'])) {
        $hide = TRUE;
    } else {
        $hide = FALSE;
    }

    if ($framework === NULL || $framework === FALSE ||
        $impact === NULL || $impact === FALSE ||
        $client_id === NULL || $client_id === FALSE) {
        $error = "Missing or incorrect framework or impact level.";
        include('../errors/error.php');
    } else { 
        // TODO: Change to header
        $controls = get_controls($framework, $impact, $hide);
        include('ctrl_select.php');
        // header("Location: .");
    }
} else if ($action == 'select_ctrl') {
    $clientctrls = filter_input(INPUT_POST, 'clientctrl', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

    // $clientctrls = $_POST['clientctrl'];
    // $client_id = filter_input(INPUT_POST, 'client_id', FILTER_VALIDATE_INT);
    // $ctrl_id = filter_input(INPUT_POST, 'ctrl_id');
    // $ctrl_name = filter_input(INPUT_POST, 'ctrl_name');

    // if (isset($_POST['ctrl_select'])) {
    //     $ctrl_implement = true;
    // } else {
    //     $ctrl_implement = false;
    // }
    // save_baseline($clientctrls);
    log_it($clientctrls);
    // save_baseline($client_id, $ctrl_id, $ctrl_name, $ctrl_implement);
    include('implementation_page.php');
}


?>