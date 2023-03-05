<?php

// Get the selected user
function get_user($username) {
    global $db;
    $query = 'SELECT firstName FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['username'];
}

// Get the selected user's first name
function get_user_fname($username) {
    global $db;
    $query = 'SELECT firstName FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['firstName'];
}

// Get the selected user's last name
function get_user_lname($username) {
    global $db;
    $query = 'SELECT lastName FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['lastName'];
}

// Get the selected user's password
function get_user_pass($username) {
    global $db;
    $query = 'SELECT password FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['password'];
}

// Authenticate the user
function auth_user($user, $pass) {
    global $db;
    $q = 'SELECT username, password FROM users WHERE username = :username';
    $statement = $db->prepare($q);
    $statement->bindValue(':username', $user);
    $statement->execute();
    $u = $statement->fetch();
    $statement->closeCursor();
    $hash = $u['password'];
    $arr = password_get_info($hash);
    $password = $pass;
    log_it($arr); log_it($hash);
    $verify = password_verify($password, $hash);
    return $verify;
}

// Get the selected user's email
function get_user_email($username) {
    global $db;
    $query = 'SELECT email FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['email'];
}

// Get the selected user's phone
function get_user_phone($username) {
    global $db;
    $query = 'SELECT phone FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['phone'];
}

// Get the selected user's address
function get_user_address($username) {
    global $db;
    $query = 'SELECT address FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['address'];
}


//Update user with any credentials that needs to be changed
function update_user($username, $userFirst, $userLast, $userPass, $userEmail, $userPhone, $userAddress) {
    global $db;
    $query = 'UPDATE users
              SET firstName = :userFirst,
              lastName = :userLast,
              password = :userPass,
              email = :userEmail,
              phone = :userPhone,
              address = :userAddress
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':userFirst', $userFirst);
    $statement->bindValue(':userLast', $userLast);
    $statement->bindValue(':userPass', $userPass);
    $statement->bindValue(':userEmail', $userEmail);
    $statement->bindValue(':userPhone', $userPhone);
    $statement->bindValue(':userAddress', $userAddress);
    $statement->execute();
    $statement->closeCursor();
}
?>