<?php include 'connection.php'; ?>

<?php

    $e_mail = $_REQUEST['e-mail'];

    $sql = "SELECT * FROM users WHERE e_mail='$e_mail'";
    $result1=mysql_query($sql);
    $count1=mysql_num_rows($result1);

    if ($count1 == 0) {

        $register = "INSERT INTO users (firstname, lastname, password, e_mail) VALUES  ('" . $_REQUEST['firstname'] . "','" . $_REQUEST['lastname'] . "','" . $_REQUEST['password'] . "','" . $_REQUEST['e-mail'] . "');";
        $con = mysql_query($register);
    }
    else {
       echo "Sama e-mailiga on juba konto loodud!";
    }
?>