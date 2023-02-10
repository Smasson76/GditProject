<?php

//Get the selected user
function get_customer($username) {
    global $db;
    $query = 'SELECT username FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $customer = $statement->fetchAll();
    $statement->closeCursor();
    return $customer;
}

?>