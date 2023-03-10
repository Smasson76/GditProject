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
    $password = filter_input(INPUT_POST, 'password');
    if ($username == NULL || $username == FALSE
        || $password == NULL || $password == FALSE) {
        $error = "Invalid input data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        $verify = auth_user($username, $password);
        if ($verify) {
            $userFirst = get_user_fname($username);
            $userLast = get_user_lname($username);
            $userEmail = get_user_email($username);
            $userPhone = get_user_phone($username);
            $userAddress = get_user_address($username);
            $_SESSION['user'] = [];
            $_SESSION['user']['usern'] = $username;
            $_SESSION['user']['user_fname'] = $userFirst;
            $_SESSION['user']['user_lname'] = $userLast;
            $_SESSION['user']['user_pass'] = $password;
            $_SESSION['user']['user_email'] = $userEmail;
            $_SESSION['user']['user_phone'] = $userPhone;
            $_SESSION['user']['user_address'] = $userAddress;
            include('user_dashboard.php');
        } else {
            $error = "The password you entered was incorrect. Please try again.";
            include('../errors/error.php');
        }
    }
} else if ($action == 'user_dashboard') {
}

else if ($action == 'update_user') {
    $username = filter_input(INPUT_POST, 'username');
    $userFirst = filter_input(INPUT_POST, 'firstName');
    $userLast = filter_input(INPUT_POST, 'lastName');
    $userPass = filter_input(INPUT_POST, 'password');
    $userEmail = filter_input(INPUT_POST, 'email');
    $userPhone = filter_input(INPUT_POST, 'phone');
    $userAddress = filter_input(INPUT_POST, 'address');

    $_SESSION['user'] = [];
    $_SESSION['user']['usern'] = $username;
    $_SESSION['user']['user_fname'] = $userFirst;
    $_SESSION['user']['user_lname'] = $userLast;
    $_SESSION['user']['user_pass'] = $userPass;
    $_SESSION['user']['user_email'] = $userEmail;
    $_SESSION['user']['user_phone'] = $userPhone;
    $_SESSION['user']['user_address'] = $userAddress;

    if ($userPass == NULL || $userEmail == NULL || $userPhone == NULL || $userAddress == NULL) {
        $error = "Missing or incorrect data";
        include('../errors/error.php');
    } else { 
        update_user($username, $userFirst, $userLast, $userPass, $userEmail, $userPhone, $userAddress);
        include('user_dashboard.php');
    }
}

?>