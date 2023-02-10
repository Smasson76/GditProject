<?php
require('../model/database.php');
require('../model/users_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_page';
    }
}

if ($action == 'login_page') {
    include('login_page.php');
}

else if ($action == 'login') {
    $username = filter_input(INPUT_POST, 'username');
    if ($username == NULL || $username == FALSE) {
        $error = "Invalid input data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        $user = get_user($username);
        include('user_dashboard.php');
    }
}

//Display the dashboard page
else if ($action == 'user_dashboard') {
    include('user_dashboard.php');
}

?>