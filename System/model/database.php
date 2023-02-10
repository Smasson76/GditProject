<?php
    $dsn = 'mysql:host=localhost;dbname=gdit_system_sql'; // CHANGE TECH SUPPORT ONCE WE HAVE A DATABASE
    $username = 'ts_user';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>