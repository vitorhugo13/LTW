<?php
    
    include_once('../includes/session.php');
    include_once('../database/db_user.php');


    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: check if the user is already logged in
    // TODO: check if the username and password have no invalid characters
    if (validCredentials($username, $password)) {
        $_SESSION['username'] = $username;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
    }
    else {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid credentials! Login failed!');
        header('Location: ../index.php');
    }

    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else {
        header('Location: ../index.php');
    }

?>
