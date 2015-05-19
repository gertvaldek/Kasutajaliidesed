<?php
/**
 * Created by PhpStorm.
 * User: Gert
 * Date: 06.05.15
 * Time: 18:47
 */

include 'connection.php';

$nevent = "INSERT INTO event (title,venue,birthday_age,description) VALUES  ('".$_REQUEST['title']."','".$_REQUEST['venue']."','".$_REQUEST['age']."','".$_REQUEST['description']."');";
$dbq = mysql_query($nevent);

?>