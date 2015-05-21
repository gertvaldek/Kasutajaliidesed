<?php

session_start();

include 'connection.php';

$active = $_SESSION['active'];

$eventId = (int)$_GET['eventId'];
$giftId = (int)$_GET['giftId'];


$comment = $_REQUEST['userComment'];

// Valin user ID, kes sisse logitud
$q_user = mysql_query("SELECT id FROM users WHERE e_mail = '$active'");
$user = mysql_fetch_array($q_user);


$sql = "INSERT INTO comments (comment, gifts_id, users_id)
        VALUES ('$comment','$giftId', '".$user['id']."')";
$result1=mysql_query($sql);
header("Location: ../party.php?eventId=$eventId");
?>