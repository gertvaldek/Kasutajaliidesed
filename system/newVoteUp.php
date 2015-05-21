<?php
/**
 * Created by PhpStorm.
 * User: Gert
 * Date: 20.05.15
 * Time: 18:55
 */

session_start();

include 'connection.php';

$active = $_SESSION['active'];

$voteId = (int)$_GET['giftId'];

$eventId = (int)$_GET['eventId'];

$vote = ("UPDATE gifts SET votes = votes + 1 WHERE id = $voteId");
$voteUp = mysql_query($vote);
header("Location: ../party.php?eventId=$eventId");


?>