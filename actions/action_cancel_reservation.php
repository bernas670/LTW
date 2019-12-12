<?php
    include_once('../includes/session.php');
    include_once('../database/db_reservation.php');
    include_once('../database/db_user.php');
    include_once('../includes/input_validation.php');
    include_once('../includes/redirect.php');

    $username = $_SESSION['username'];
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to cancel your reservation');
        die(header('Location: ../pages/login.php'));
    }

    $reservation_id = $_GET['id'];
    $resevation_info = get_reservation_info($reservation_id);

    if($username != $resevation_info['tourist']){
        die(redirect('error', 'You cannot delete other user reservation.'));
    }

    cancel_reservation($reservation_id);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Reservation canceled!');
    
    header("Location: ../pages/manage_reservations.php");


?>