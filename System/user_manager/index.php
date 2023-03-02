<?php
$lifetime = 60 * 60 * 24 * 365;             // 1 year in seconds
session_set_cookie_params($lifetime, '/');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require('../model/database.php');
require('../model/users_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'login_page';
    }
}

if ($action == 'login_page') {
    include('login_page.php');
} else if ($action == 'login') {
    $username = filter_input(INPUT_POST, 'username');
    $userFirst = get_user_fname($username);
    $userLast = get_user_lname($username);
    $userPass = get_user_pass($username);
    $userEmail = get_user_email($username);
    if ($username == NULL || $username == FALSE) {
        $error = "Invalid input data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
                
        $_SESSION['user'] = [];
        $_SESSION['user']['usern'] = $username;
        $_SESSION['user']['user_fname'] = $userFirst;
        $_SESSION['user']['user_lname'] = $userLast;
        $_SESSION['user']['user_pass'] = $userPass;
        $_SESSION['user']['user_email'] = $userEmail;
        
        include('user_dashboard.php');
    }
} else if ($action == 'user_dashboard') {
}

else if ($action == 'update_user') {
    $username = filter_input(INPUT_POST, 'username');
    $userFirst = filter_input(INPUT_POST, 'firstName');
    $userLast = filter_input(INPUT_POST, 'lastName');
    $userPass = filter_input(INPUT_POST, 'password');
    $userEmail = filter_input(INPUT_POST, 'email');

    $_SESSION['user'] = [];
    $_SESSION['user']['usern'] = $username;
    $_SESSION['user']['user_fname'] = $userFirst;
    $_SESSION['user']['user_lname'] = $userLast;
    $_SESSION['user']['user_pass'] = $userPass;
    $_SESSION['user']['user_email'] = $userEmail;

    if ($userPass == NULL) {
        $error = "Missing or incorrect data";
        include('../errors/error.php');
    } else { 
        update_user($username, $userFirst, $userLast, $userPass, $userEmail);
        include('user_dashboard.php');
    }
}
?>