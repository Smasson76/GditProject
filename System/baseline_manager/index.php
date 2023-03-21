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
    // var_dump($client_id);
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
    $clientctrls = filter_input(INPUT_POST, 'ctrlset', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    $clientid = filter_input(INPUT_POST, 'clientid');
    if ($clientctrls === NULL || $clientctrls === FALSE) {
    $error = "Missing or incorrect framework or impact level.";
    include('../errors/error.php');
    } else { 
        save_baseline($clientctrls);
        $controls = get_saved_baseline($clientid);
        include('implementation_page.php');
    }
} else if ($action == 'save_imp') {
    $bl_implementation = filter_input(INPUT_POST, 'savebl', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    $clientid = filter_input(INPUT_POST, 'clientid');
    update_baseline($bl_implementation);

    include('../user_manager/user_dashboard.php');}

?>