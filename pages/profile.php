<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../database/db_user.php');


    $username = $_GET['username'];
    // TODO: check if the username has invalid characters

    $profile_info = getUserInfo($username);

    if ($profile_info == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Could not find user with username: ' . $username);
        // TODO: change this page
        die(header('Location: ../index.php'));
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="UTF-8">
    </head>
    <body>

        <?php draw_header(); ?>

        <section id="profile">
            <p><?=$profile_info['username']?></p>
        </section>
        
        <?php if ($username == $_SESSION['username']) { ?>
            <a href="./edit_profile.php">Edit profile</a>
        <?php } ?>

        <?php draw_footer(); ?>

    </body>
</html>