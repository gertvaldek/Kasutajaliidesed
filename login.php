<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Sünnipäeva korraldamine v2.0</title>


    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div ng-app="validationApp" ng-controller="mainController">
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body">


                <form name="userForm" ng-submit="submitForm()" novalidate>

                    <!-- NAME -->
                    <div class="form-group" ng-class="{ 'has-error' : userForm.name.$invalid}">
                        <label>Nimi</label>
                        <input type="text" name="name" class="form-control" ng-model="user.name" required>

                        <p ng-show="userForm.name.$invalid && !userForm.name.$pristine" class="help-block">Nimi on
                            nõutud.</p>
                    </div>

                    <!-- EMAIL -->
                    <div class="form-group" ng-class="{ 'has-error' : userForm.email.$invalid}">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" ng-model="user.email">

                        <p ng-show="userForm.email.$invalid" class="help-block">Sisestage kehtiv e-mail.</p>
                    </div>

                    <button type="submit" class="btn btn-primary" ng-disabled="userForm.$invalid">Logi sisse</button>

                </form>

            </div>
        </div>

    </div>

    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
    <script src='http://code.angularjs.org/1.2.6/angular.js'></script>

    <script src="js/login.js"></script>

</body>

</html>