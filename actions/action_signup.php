<?php
include_once('../database/user.php');

$username = $_POST['username'];
$password = $_POST['password'];

//TODO: se estiver a dar bosta aqui tentar usar o HTTP_REFERER ($_SERVER user provavelmente tbm é útil)

if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION["ERROR"] = "Username can only contain letters(upper/lower case) and numbers";
    die(header('Location: ../pages/signup.html')); //.html ou .php (not sure)
}

if($username && $password){
    if(!usernameExists($username)){
        if(isPasswordValide($password)){
            addNewUser($username, $password);
            echo hello;
        }
        else{
            $_SESSION["ERROR"] = "Password must have at minimum 5 characters, including at least 1 number.";
            header("Location:".$_SERVER['HTTP_REFERER']."");
        }
    }
    else{
        $_SESSION["ERROR"] = "Username already taken...";
        header("Location:".$_SERVER['HTTP_REFERER'].""); //When a web browser moves from one website to another and between pages of a website, it can optionally pass the URL it came from. 
    }
}
else{
    $_SESSION["ERROR"] = "Username and Password must be field.";
    header('Location: ../pages/signup.html'); //se der erro redirecionar novamente para signup page
}
?>