<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require('../model/database.php');
require('../model/users_db.php');
require('../model/baseline_db.php');
require('../model/clients_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'view_accounts';
    }
}

if ($action == 'view_accounts') {
    $clients = get_all_clients();
    include('view_accounts.php');
}

else if ($action == 'select_client') {
    $client_id = filter_input(INPUT_POST, 'client_id');
    $client_name = filter_input(INPUT_POST, 'client_name');
    $client_alias = filter_input(INPUT_POST, 'client_alias');
    $client_email = filter_input(INPUT_POST, 'client_email');

    $baselines = get_saved_baseline($client_id);
    include('view_client.php');
}

else if ($action == 'update_client') {
    $client_id = filter_input(INPUT_POST, 'client_id');
    $client_name = filter_input(INPUT_POST, 'client_name');
    $client_alias = filter_input(INPUT_POST, 'client_alias');
    $client_email = filter_input(INPUT_POST, 'client_email');

    update_client($client_id, $client_name, $client_alias, $client_email);
    $clients = get_all_clients();
    include('view_accounts.php');
}

?>