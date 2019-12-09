<?php

include_once('../includes/database.php');



function get_comments($property_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT username, content, date FROM comment WHERE property_id = ?');
    $stmt->execute(array($property_id));

    return $stmt->fetchAll();
}


function insert_comment($username, $property_id, $date, $content)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO comment(username, property_id, date, content) VALUES(?, ?, ?, ?)');
    $stmt->execute(array($username, $property_id, $date, $content));
}


function delete_comment($comment_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM comment WHERE id = ?');
    $stmt->execute(array($comment_id));
}


?>
