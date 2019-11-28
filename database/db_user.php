<?php

    include_once('../includes/database.php');
    

    //functions related with users (login, logout, signup)

    function availableUsername($username) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($username));

        return $stmt->fetch() ? false : true;
    }

    function insertUser($username, $password) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('INSERT INTO user(username, password) VALUES(?, ?)');

        $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));
    }

    function validCredentials($username, $password) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($username));

        $user = $stmt->fetch();

        return $user !== false && password_verify($password, $user['password']);
    }

    function getUserInfo($username) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($username));

        return $stmt->fetch();
    }

    function changePassword($username, $new_password) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('UPDATE user SET password = ? WHERE username = ?');
        $stmt->execute(array(password_hash($new_password, PASSWORD_DEFAULT), $username));

        return $stmt->fetch();
    }

    function changeUsername($username, $new_username) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('UPDATE user SET username = ? WHERE username = ?');
        $stmt->execute(array($new_username, $username));

        return $stmt->fetch();
    }

    function getUserID($username){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT id FROM user WHERE username = ?');
        $stmt->execute(array($username));

        //if doesn't exists nothing it returns null
        return $stmt->fetch()['id'];
    }
    
?>
