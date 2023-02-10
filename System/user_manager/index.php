<?php
//require('../model/database.php');
//require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'user_dashboard';
    }
}

if ($action == 'user_dashboard') {
    include('user_dashboard.php');
}

else if ($action == 'start_baseline') {
    include('start_baseline.php');
}
?>