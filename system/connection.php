<?php
/*
 *
 *  !! COMMENTED OUT UNTIL REAL SQL USER PASS INSERTED !!
 *
 *
session_start();
$active = $_SESSION['active'];

$con = mysql_connect("d8487.mysql.zone.ee","d8487sa83256","83fGuK");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("d8487sd95841", $con);
*/

session_start();
$active = $_SESSION['active'];

$con = mysql_connect("localhost","root","");
if (!$con) {
    die('Could not connect: ' . mysql_error($con));
}
mysql_select_db("kasutajaliidesed");
mysql_set_charset('utf8', $con);

?>