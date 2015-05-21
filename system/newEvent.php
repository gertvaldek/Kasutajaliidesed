<?php
/**
 * Created by PhpStorm.
 * User: Gert
 * Date: 06.05.15
 * Time: 18:47
 */

include 'connection.php';

$event = "INSERT INTO events (title,date ,time, venue,description, birthday_age) VALUES  ('" . $_REQUEST['title'] . "','" . $_REQUEST['date'] . "','" . $_REQUEST['time'] . "','" . $_REQUEST['venue'] . "','" . $_REQUEST['description'] . "','" . $_REQUEST['age'] . "');";
$dbq = mysql_query($event);
header("Location: ../index.php");

?>