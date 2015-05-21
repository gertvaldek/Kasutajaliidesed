<?php

session_start();

include 'connection.php';

$active = $_SESSION['active'];

$eventId = (int)$_GET['eventId'];

$name = $_REQUEST['giftName'];
$desc = $_REQUEST['giftDescription'];
$price = $_REQUEST['giftPrice'];


$sql = "INSERT INTO gifts (gift_name, gift_description, gift_price, events_id)
        VALUES ('$name','$desc', '$price', '$eventId')";
$result1 = mysql_query($sql);
header("Location: ../party.php?eventId=$eventId");
?>