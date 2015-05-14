<?php

session_start();

include 'connection.php';

$active = $_SESSION['active'];

$eventId = (int)$_GET['eventId'];

echo "Event id on " . $eventId;
// Valin user ID, kes sisse logitud
$q_user = mysql_query("SELECT id FROM users WHERE e_mail = '$active'");
$user = mysql_fetch_array($q_user);


// Inserdin või uuendan attendi
$sql = "REPLACE INTO attendees (events_id, users_id, status)
VALUES ('$eventId','".$user['id']."', '".$_REQUEST['status']."')";
$con = mysql_query($sql);
header("Location: ../party.php?eventId=$eventId");



?>