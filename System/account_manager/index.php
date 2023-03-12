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

?>