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


//Update user with any credentials that needs to be changed
function update_user($username, $userFirst, $userLast, $userPass, $userEmail) {
    global $db;
    $query = 'UPDATE users
              SET firstName = :userFirst,
              lastName = :userLast,
              password = :userPass,
              email = :userEmail
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':userFirst', $userFirst);
    $statement->bindValue(':userLast', $userLast);
    $statement->bindValue(':userPass', $userPass);
    $statement->bindValue(':userEmail', $userEmail);
    $statement->execute();
    $statement->closeCursor();
}
?>