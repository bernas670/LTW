<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');
    include_once('../includes/input_validation.php');
    include_once('../includes/redirect.php');



    $username = $_SESSION['username'];
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to change your password');
        die(header('Location: ../pages/login.php'));
    }

    
    $old_password = $_POST['old_password'];
    if(!check_password($old_password)){
        die(redirect('error','Password contains invalid characters.'));
    }
    if (!validCredentials($username, $old_password)) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid password');
        die(header('Location: ../pages/edit_profile.php'));
    }


    $new_password = $_POST['new_password'];
    $rep_password = $_POST['rep_password'];
    // check if the old password and the confirmation one are equal
    if ($new_password != $rep_password) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'New passwords don\'t match');
        die(header('Location: ../pages/edit_profile.php'));
    }


    if(!check_password($new_password)){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Password invalid( at least 5 characters, minimum 1 letter and 1 number, limited special chars)');
        die(header('Location: ../pages/edit_profile.php'));
    }

    
    changePassword($username, $new_password);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Password changed successfuly!');
    header('Location: ../pages/edit_profile.php');

?>
