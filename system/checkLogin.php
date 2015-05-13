<?php
/**
 * Created by PhpStorm.
 * User: Gert
 * Date: 13.05.15
 * Time: 14:50
 */
include ($_SERVER['DOCUMENT_ROOT'].'/system/connection.php');

$myusername=$_POST['email'];
$myusername = stripslashes($myusername);
$myusername = mysql_real_escape_string($myusername);

$mypassword=$_POST['password'];
$mypassword = stripslashes($mypassword);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM users WHERE e_mail='$myusername' AND password='$mypassword'";
$result1=mysql_query($sql);
$count1=mysql_num_rows($result1);
//$mypassword=$_POST['mypassword'];
//$mypassword = stripslashes($mypassword);
//$mypassword = mysql_real_escape_string($mypassword);
//$sql="SELECT * FROM Registered WHERE Password='$mypassword'";
//$result2=mysql_query($sql);
//$count2=mysql_num_rows($result2);

if($count1==1){
    $_SESSION['myusername']="username";
    header("Location: index.php");
    $_SESSION['active'] = $_POST['myusername'];
} else {
    echo "E-mail või parool on vale";
}

?>