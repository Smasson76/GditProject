<?php

// Get the selected user
function get_user($username) {
    global $db;
    $query = 'SELECT u_alias FROM users
              WHERE u_alias = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['u_alias'];
}

// Get the selected user's first name
function get_user_fname($username) {
    global $db;
    $query = 'SELECT u_first FROM users
              WHERE u_alias = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['u_first'];
}

// Get the selected user's last name
function get_user_lname($username) {
    global $db;
    $query = 'SELECT u_last FROM users
              WHERE u_alias = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['u_last'];
}

// Get the selected user's password
function get_user_pass($username) {
    global $db;
    $query = 'SELECT u_password FROM users
              WHERE u_alias = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['u_password'];
}

// Authenticate the user
function auth_user($user, $pass) {
    global $db;
    $q = 'SELECT u_alias, u_password FROM users WHERE u_alias = :username';
    $statement = $db->prepare($q);
    $statement->bindValue(':username', $user);
    $statement->execute();
    $u = $statement->fetch();
    $statement->closeCursor();
    $hash = trim($u['u_password']);
    $password = trim($pass);
    $verify = password_verify($password, $hash);
    return $verify;
}

// Get the selected user's email
function get_user_email($username) {
    global $db;
    $query = 'SELECT u_email FROM users
              WHERE u_alias = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['u_email'];
}

// Get the selected user's phone
function get_user_phone($username) {
    global $db;
    $query = 'SELECT u_phone FROM users
              WHERE u_alias = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['u_phone'];
}

// Get the selected user's address
function get_user_address($username) {
    global $db;
    $query = 'SELECT u_address FROM users
              WHERE u_alias = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userdata = $statement->fetch();
    $statement->closeCursor();
    return $userdata['u_address'];
}

//Update user with any credentials that needs to be changed
function update_user($username, $userFirst, $userLast, $userPass, $userEmail, $userPhone, $userAddress) {
    $userPass = hash_password($userPass);
    global $db;
    $query = 'UPDATE users
              SET u_first = :userFirst,
              u_last = :userLast,
              u_password = :userPass,
              u_email = :userEmail,
              u_phone = :userPhone,
              u_address = :userAddress
              WHERE u_alias = :username';
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