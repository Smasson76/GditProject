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

// Get the selected user's first name
function get_user_Lname($username) {
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

?>