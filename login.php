<?php
session_start();


include 'system/connection.php';?>

<!DOCTYPE html>
<html>


<?php include 'include/head.php'; ?>
<link rel="stylesheet" href="css/style.css">
<body>

<div ng-app="validationApp" ng-controller="mainController">
    <div class="container">
        <img src="images/logo.png" >
        <div class="panel panel-default">
            <div class="panel-body">


                <form method="post" action="checkLogin.php" name="userForm" ng-submit="submitForm()" novalidate>


                    <!-- EMAIL -->
                    <div class="form-group" ng-class="{ 'has-error' : userForm.email.$invalid}">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" ng-model="user.email">

                        <p ng-show="userForm.email.$invalid" class="help-block">Sisestage kehtiv e-mail.</p>
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group" ng-class="{ 'has-error' : userForm.name.$invalid}">
                        <label>Nimi</label>
                        <input type="password" name="password" class="form-control" ng-model="user.name" required>

                        <p ng-show="userForm.name.$invalid && !userForm.name.$pristine" class="help-block">Nimi on
                            nõutud.</p>
                    </div>

                    <button type="submit" class="btn btn-primary" ng-disabled="userForm.$invalid">Logi sisse</button>
                    <button onclick="location.href='register.php'" class="btn btn-primary" >Registreeru</button>

                </form>

            </div>
        </div>

    </div>
    </div>

    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
    <script src='http://code.angularjs.org/1.2.6/angular.js'></script>

    <script src="js/validator.js"></script>

</body>

</html>