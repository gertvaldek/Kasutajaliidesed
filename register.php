<?php include 'system/connection.php'; ?>

<!DOCTYPE html>
<html>


<?php include 'include/head.php'; ?>
<link rel="stylesheet" href="css/style.css">
<body>

<div ng-app="validationApp" ng-controller="mainController">
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body">


                <form name="userForm" ng-submit="submitForm()" novalidate>

                    <!-- NAME -->


                    <!-- EMAIL -->
                    <div class="form-group" ng-class="{ 'has-error' : userForm.name.$invalid}">
                        <label>Eesnimi</label>
                        <input type="password" name="firstname" class="form-control" ng-model="user.name" required>

                        <p ng-show="userForm.name.$invalid" class="help-block">Eesnimi on
                            nõutud.</p>
                    </div>
                    <div class="form-group" ng-class="{ 'has-error' : userForm.name.$invalid}">
                        <label>Perenimi</label>
                        <input type="password" name="lastname" class="form-control" ng-model="user.name" required>

                        <p ng-show="userForm.name.$invalid" class="help-block">Perenimi on
                            nõutud.</p>
                    </div>
                    <div class="form-group" ng-class="{ 'has-error' : userForm.email.$invalid}">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" ng-model="user.email">

                        <p ng-show="userForm.email.$invalid" class="help-block">Sisestage kehtiv e-mail.</p>
                    </div>
                    <div class="form-group" ng-class="{ 'has-error' : userForm.name.$invalid}">
                        <label>Parool</label>
                        <input type="password" name="password" class="form-control" ng-model="user.name" required>

                        <p ng-show="userForm.name.$invalid" class="help-block">Parool on
                            nõutud.</p>
                    </div>

                    <button type="submit" class="btn btn-primary" ng-disabled="userForm.$invalid">Registreeru</button>

                </form>

            </div>
        </div>

    </div>
</div>

<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
<script src='http://code.angularjs.org/1.2.6/angular.js'></script>

<script src="js/login.js"></script>

</body>

</html>