<?php
    $dsn = 'mysql:host=localhost;dbname=gdit_system'; // CHANGE TECH SUPPORT ONCE WE HAVE A DATABASE
    $username = 'ts_user';
    $password = 'pa55word';
    global $current_client;
    try {
        $db = new PDO($dsn, $username, $password);
        $i = check_install();
        $in = intval($i[0][2]); // is installed already?
        $fr = intval($i[1][2]); // is first run?
        if($in == 0){
            if ($fr == 0) {
                first_run();
            } else {
                log_it('GDIT first run completed.');
            }
        } else {
            log_it('GDIT previously installed');
        }
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }

    function check_install() {
        global $db;
        $sql = 'SELECT * FROM gdit_sys_install';
        $statement = $db->prepare($sql);
        $statement->execute();
        $install_status = $statement->fetchAll();
        $statement->closeCursor();
        return $install_status;
    }

    function first_run() {
        $bcost = test_cost();
        $users = get_users_to_mod();
        $users = hash_pass($users, $bcost);
        update_install();
    }

    function test_cost() {
        /**
         * This code will benchmark your server to determine how high of a cost you can
         * afford. You want to set the highest cost that you can without slowing down
         * you server too much. 8-10 is a good baseline, and more is good if your servers
         * are fast enough. The code below aims for ≤ 50 milliseconds stretching time,
         * which is a good baseline for systems handling interactive logins.
         */
        $timeTarget = 0.05; // 50 milliseconds 

        $cost = 8;
        do {
            $cost++;
            $start = microtime(true);
            password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $timeTarget);

        global $db;
        $sql = 'UPDATE gdit_sys_install SET option_value = :cost
                WHERE option_name = \'serv_bcryp_cost\'';
        $statement = $db->prepare($sql);
        $statement->bindValue(':cost', $cost);
        $statement->execute();
        $statement->closeCursor();

        return $cost;
    }
        
    function update_install() {
        global $db;
        $sql = 'UPDATE gdit_sys_install SET option_value = \'1\' WHERE option_name = \'gdit_install\'; UPDATE gdit_sys_install SET option_value = \'1\' WHERE option_name = \'gdit_install\'; ';
        $statement = $db->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_users_to_mod() {
        global $db;
        $sql = 'SELECT * FROM users WHERE users.password is not null';
        $statement = $db->prepare($sql);
        $statement->execute();
        $users_to_mod = $statement->fetchAll();
        $statement->closeCursor();
        return $users_to_mod;
    }

    function hash_pass($u, $bcost) {
        $options = ['cost' => $bcost];
        foreach($u as $key => $user) : 
            $pass = $user['password'];
            $newpass = password_hash($pass, PASSWORD_BCRYPT, $options);
            $u[$key]['password'] = trim($newpass); 
            update_pwd($u[$key]);
        endforeach;
        return $u;
    }
    
    function hash_password($p) {
        $b = get_bcrypt();
        $options = ['cost' => $b];
        $newp = password_hash($p, PASSWORD_BCRYPT, $options);
        $newp = trim($newp);
        return $newp;
    }
    
    function update_pwd($u) {
        global $db;
        $query = 'UPDATE users
            SET password = :userPass
            WHERE email = :userEmail';
        $statement = $db->prepare($query);
        $statement->bindValue(':userEmail', $u['email']);
        $statement->bindValue(':userPass', $u['password']);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_bcrypt() {
        global $db;
        $q = 'SELECT option_value from gdit_sys_install WHERE option_name=\'serv_bcryp_cost\'';
        $statement = $db->prepare($q);
        $statement->execute();
        $cost = $statement->fetch();
        $cost = intval($cost[0]);
        $statement->closeCursor();
        return $cost;
    }

    function log_it($output, $with_script=true) {
        $js = 'console.log('.json_encode($output, JSON_HEX_TAG).');';
        if ($with_script) {
            $js = '<script>'.$js.'</script>';
        }
        echo $js;
    }
?>

