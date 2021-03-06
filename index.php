<?php include 'system/connection.php';

session_start();
$active = $_SESSION['active'];

?>


<html ng-app="ui.bootstrap.demo">

<?php include 'include/head.php'; ?>
<link rel="stylesheet" href="css/index.css">
<body>
<section class="tabs" ng-controller="TabsController as tabs">

    <?php include 'include/nav.php'; ?>

    <div ng-show="tabs.isSet(1)">
        <div class="events" ng-controller="TabsDemoCtrl">
            <h4>Toimuvad üritused
                <small> Soovitame osaleda!</small>
            </h4>

            <p id="demo"></p>

            <div class="list-group">
                <?php
                $q_event = mysql_query('SELECT id, title, birthday_age, date, time, venue, description FROM events ORDER BY id DESC ');
                while ($event = mysql_fetch_array($q_event)) {

                    echo '<a href="party.php?eventId=' . $event['id'] . ' "class="list-group-item" >';
                    echo "<div class='row'>";
                    echo "<div class='col-md-3'><img src='images/party1.jpg' alt='Birth1' class='img-thumbnail'></div>";
                    echo "<div class='col-md-9'>";
                    echo "<h4>" . $event['title'] . " <span class='label label-primary'>" . $event['birthday_age'] . "</span></h4>";
                    echo "<span class='glyphicon glyphicon-calendar' aria-hidden='true'></span> " . $event['date'];
                    echo "  <span class='glyphicon glyphicon-map-marker' aria-hidden='true''></span>" . $event['venue'];
                    echo "<hr/>";
                    echo $event['description'];
                    echo " </div></div></a>";

                }
                ?>
            </div>
        </div>
    </div>

    <!-- 2 TAB 2        2 TAB 2 -->

    <div ng-show="tabs.isSet(2)">

        <?php include 'event.php'; ?>

        <!-- END TAB 2 -->
    </div>

</section>
</body>

</html>