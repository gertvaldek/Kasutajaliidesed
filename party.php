<?php include 'system/connection.php';

session_start();
$active = $_SESSION['active'];

?>

<html ng-app="ui.bootstrap.demo">
<head>
    <?php include 'include/head.php'; ?>

<link rel="stylesheet" href="css/party.css">
</head>
<body>
<section class="tabs" ng-controller="TabsController as tabs">

    <?php include 'include/nav.php'; ?>

    <!-- TAB 1            TAB 1 ==========================================================================  -->

    <?php

    // Võtan URList event ID
   $eventId = (int)$_GET['eventId'];

    ?>


    <div ng-show="tabs.isSet(1)">

            <div class="backButton">

                    <ul class="pager">
                        <li><a onclick="javascript:window.location.href='index.php'"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">    </a></li>

                    </ul>

            </div>

        <div class="events" ng-controller="TabsDemoCtrl">
            <tabset justified="true">
                <tab heading="Info">

                    <div ng-controller="AccordionDemoCtrl">
                        <hr/>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">

                                    <div class="col-md-5">

                                        <?php
                                        $q_event = mysql_query("SELECT id, title, birthday_age, date, time, venue, description FROM events WHERE id = '$eventId' ORDER BY id DESC ");
                                        while ($event = mysql_fetch_array($q_event)) {

                                            echo '<img src="images/party1.jpg" alt="Pidu 1" class="img-thumbnail"></div>';
                                        echo '<div class="col-md-7">';
                                        echo '<h3>' . $event['title'] . '  <span class="label label-primary">' . $event['birthday_age'] . '</span></h3>';
                                        echo '<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> ' . $event['date'] . "  ";
                                            echo '<span class="glyphicon glyphicon-time" aria-hidden="true"></span> ' . $event['time'];
                                        echo '  <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> ' . $event['venue'];
                                        echo '<hr/>';
                                        echo $event['description'];
                                        echo '<hr/>';

                                        } ?>
                                        <div ng-controller="ModalDemoCtrl">
                                            <script type="text/ng-template" id="myModalContent.html">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Ürituse asukoht</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2031.2093282457106!2d24.671312999999994!3d59.396220000000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x6d2aca157f975923!2sTallinna+Tehnika%C3%BClikooli+Raamatukogu!5e0!3m2!1sen!2see!4v1428518538792"
                                                            width="100%" height="400" frameborder="0"
                                                            style="border:0"></iframe>
                                                </div>
                                            </script>

                                            <button class="btn btn-default" ng-click="open('lg')">Asukoht kaardil
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </tab>

                <tab heading="Osalejad">
                    <hr/>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Märgi ennast osalejaks <span class="label label-primary">Nüüd ja kohe!</span>
                                    </h4>
                                    <hr/>
                                    <form id="attendForm" method="post" action="system/newAttend.php?eventId=<?php echo "$eventId"; ?>">

                                        <button id="submit" name="status" value="Jah" class="btn btn-default">Jah</button>
                                        <button id="submit" name="status" value="Võib-olla" class="btn btn-default">Võib-olla</button>
                                        <button id="submit" name="status" value="Ei" class="btn btn-default">Ei</button>

                                        <hr/>

                                    </form>

                                </div>
                                <div class="col-md-6">
                                    <h4>Osalejad</h4>
                                    <?php
                                    echo '<table class="table">';
                                    $q_attend = mysql_query("SELECT events_id, users_id, status, users.firstname, users.lastname FROM attendees LEFT JOIN users ON attendees.users_id = users.id WHERE events_id = '$eventId' ORDER BY attend_time DESC"); //  "
                                    while ($attend = mysql_fetch_array($q_attend)) {

                                        echo '<tr><td>';
                                        echo $attend['firstname'] . " " . $attend['lastname'];
                                        echo '</td><td id="result">';
                                        echo $attend['status'];
                                        echo '</td></tr>';
                                    }
                                    echo '</table>';

                                    ?>


                                </div>
                            </div>


                        </div>
                    </div>
                </tab>

                <tab heading="Kingitused">
                    <hr/>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-4">

                                <h4>Lisa kingitus</h4>
                                <hr/>
                                <form method="post" action="system/newGift.php?eventId=<?php echo "$eventId"; ?>">
                                    <div class="input-group">
                                        <span class="input-group-addon">Nimi</span>
                                        <input name="giftName" type="text" class="form-control" required>
                                    </div>
                                    <div class="input-group">

                                    <span class="input-group-addon">Hind</span>
                                        <input name="giftPrice" type="text" class="form-control" required>
                                    </div>
                                    <textarea name="giftDescription" class="form-control" rows="3" placeholder="Kirjeldus" required></textarea>
                                    <br>
                                    <button id="submit" type="submit" class="btn btn-primary">Lisa kingitus
                                    </button>
                                    <hr/>
                                </form>

                            </div>
                            <div class="col-md-8">

                                            <?php

                $q_gift = mysql_query("SELECT id, gift_name, gift_description, gift_price, events_id FROM gifts WHERE events_id = '$eventId' ORDER BY id DESC");
                while ($gift = mysql_fetch_array($q_gift)) {

                    $giftId = $gift['id'];

                    // Loen hääled ära iga kingituse kohta
                    $thumbs = mysql_query("SELECT votes, id FROM gifts WHERE id = $giftId");
                    $voteCount = mysql_fetch_array($thumbs);

                    $id = $gift['id'];
                    $votes = $voteCount['votes'];

                    // echo "debug " .$votes;

                    echo "<li class='list-group-item'><div class='row'>

                                        <div class='col-md-2'>";
                    echo "<h3>" . $gift['gift_name'] . " </h3><h4><span class='label label-primary'>" . $gift['gift_price'] . "€</span></h4>

                                </div>
                    ";
                    echo "<div class='col-md-7'>" . $gift['gift_description'] . "

                    </br>

                    </div><div class='col-md-3'>                    <a href='system/newVoteUp.php?giftId=$id&eventId=$eventId'><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span></a> $votes <a href='system/newVoteDown.php?giftId=$id'><span class='glyphicon glyphicon-thumbs-down' aria-hidden='true'></span></a>
                    </p></ü><button id='submit' type='button' class='btn btn-default btn-sm'>Kommentaarid
                                    </button></div>";


                    echo "

                                        </div>


                                </li>";
                        }
                        ?>

                            </div>
                </tab>


            </tabset>

        </div>
    </div>

    <!-- 2 TAB 2        2 TAB 2  ================================================================= -->

    <div ng-show="tabs.isSet(2)">

            <?php include 'event.php'; ?>

    </div>
    <!-- END TAB 2 -->
</section>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCasRZV40wstmFA-Tu6SbYEgiZneL1uLFs">
</script>
</body>

</html>