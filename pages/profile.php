<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_profile.php');
    include_once('../database/db_user.php');
    include_once('../debug/debug.php');

    

    // TODO: check if the username has invalid characters
    $username = $_GET['username'];

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
        <meta charset="utf-8">

        <link href="../css/common.css" rel="stylesheet">

    </head>
    <body>

        <?php draw_header(); ?>
        <?php draw_profile($profile_info); ?>
        <?php draw_footer(); ?>

    </body>
</html>