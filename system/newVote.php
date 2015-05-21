<?php
/**
 * Created by PhpStorm.
 * User: Gert
 * Date: 20.05.15
 * Time: 18:11
 */

session_start();

include 'connection.php';

$active = $_SESSION['active'];

$eventId = (int)$_GET['eventId'];


$event = "INSERT INTO gift_has_votes (title,venue,birthday_age,description)
VALUES  ('" . $_REQUEST['title'] . "','" . $_REQUEST['venue'] . "','" . $_REQUEST['age'] . "','" . $_REQUEST['description'] . "');";
$dbq = mysql_query($event);

?>