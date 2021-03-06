<?php

include_once('../includes/database.php');


function all_property_reservation($property_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM reservation WHERE property_id = ?');
    $stmt->execute(array($property_id));

    return $stmt->fetchAll();
}

function add_reservation($property_id, $tourist, $arrival_date, $departure_date)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO reservation(property_id, tourist, arrival_date, departure_date) VALUES(?, ?, ?, ?)');
    $stmt->execute(array($property_id, $tourist, $arrival_date, $departure_date));
}

function get_user_reservations($username)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM reservation WHERE tourist = ?');
    $stmt->execute(array($username));

    return $stmt->fetchAll();
}

function cancel_reservation($reservation_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM reservation WHERE id = ?');
    $stmt->execute(array($reservation_id));
}

//funções que retornar as reservas de propriedades
function reservations_of_property_upcoming($id){

    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM reservation WHERE property_id = ? AND arrival_date > ?');
    $stmt->execute(array($id, date('Y-m-d')));

    return $stmt->fetchAll();

}

function current_reservation($id){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM reservation WHERE property_id = ? AND arrival_date <= ? AND departure_date > ?');
    $stmt->execute(array($id, date('Y-m-d'), date('Y-m-d')));

    return $stmt->fetchAll();
}

function reservations_of_property_previous($id){

    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM reservation WHERE property_id = ? AND departure_date <= ?');
    $stmt->execute(array($id, date('Y-m-d')));

    return $stmt->fetchAll();

}

//funções que retornar as reservas de um username
function reservations_of_user_upcoming($user){

    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM reservation WHERE tourist = ? AND arrival_date > ?');
    $stmt->execute(array($user, date('Y-m-d')));

    return $stmt->fetchAll();

}

function current_user_reservation($user){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM reservation WHERE tourist = ? AND arrival_date <= ? AND departure_date > ?');
    $stmt->execute(array($user, date('Y-m-d'), date('Y-m-d')));

    return $stmt->fetchAll();
}

function reservations_of_user_previous($user){

    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM reservation WHERE tourist = ? AND departure_date <= ?');
    $stmt->execute(array($user, date('Y-m-d')));

    return $stmt->fetchAll();

}

function get_reservation_info($id){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM reservation WHERE id = ?');
    $stmt->execute(array($id));

    return $stmt->fetch();
}

