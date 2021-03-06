<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');

include_once('../database/db_user.php');
include_once('../database/db_property.php');
include_once('../database/db_property_image.php');

include_once('../templates/tpl_common.php');
include_once('../templates/tpl_property.php');



if ($_SESSION['username'] == null) {
    die(redirect_login('error', 'Please log in to manage your properties.'));
}

$username = $_SESSION['username'];
$user_properties = get_user_properties($username);
$number_of_properties = count($user_properties);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Place Genie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/manage_properties.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <script src="../javascript/messages.js" type="module" defer></script>

</head>

<body>

    <?php draw_header(); ?>

    <ul>
        <?php
        if ($number_of_properties > 0) {
            foreach ($user_properties as $user_property) {
                $image = get_property_preview_image($user_property['id']);    
                draw_manage_property($image, $user_property);
            }
        } else {
            draw_no_properties();
        }
        ?>
    </ul>
    <div class="add_property"><a class="button" href="./add_property.php">Add property</a></div>

</body>

</html>