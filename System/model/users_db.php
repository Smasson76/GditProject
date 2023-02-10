<?php

//Get sign-in user
function get_user($username, $password) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE username = :username AND
              WHERE password = :password';
    $statement = $db->prepare($query);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}
?>