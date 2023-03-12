<?php

//Get all clients
function get_all_clients() {
    global $db;
    $sql = 'SELECT * FROM clients';
    $statement = $db->prepare($sql);
    $statement->execute();
    $clients = $statement->fetchAll();
    $statement->closeCursor();
    return $clients;   
}

//Update client with any credentials that needs to be changed
function update_client($id, $name, $alias, $email) {
    global $db;
    $query = 'UPDATE clients
              SET cl_name = :name,
              cl_alias = :alias,
              cl_email = :email
              WHERE cl_id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':alias', $alias);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}

?>