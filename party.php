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
                            <div class="col-md-6">

                                <h4>Lisa kingitus</h4>
                                <hr/>
                                <form ng-controller="GiftsController">
                                    <div class="input-group">
                                        <span class="input-group-addon">Nimi</span>
                                        <input name="giftName" type="text" class="form-control">
                                    </div>
                                    <div class="input-group">

                                    <span class="input-group-addon">Hind</span>
                                        <input name="giftPrice" type="text" class="form-control">
                                    </div>
                                    <textarea name="giftDescription" class="form-control" rows="3" placeholder="Kirjeldus"></textarea>
                                    <br>
                                    <button ng-click='btn_add();' type="button" class="btn btn-primary">Lisa kingitus
                                    </button>
                                    <hr/>
                                </form>

                            </div>
                            <div class="col-md-6">

                                            <?php
                $q_gift = mysql_query("SELECT id, gift_name, gift_description, gift_price, events_id FROM gifts WHERE events_id = '$eventId' ORDER BY id DESC");
                while ($gift = mysql_fetch_array($q_gift)) {

                    echo "<a class='list-group-item'>
                                    <div class='row'>
                                        <div class='col-md-9'>";
                    echo "<h2>" . $gift['gift_name'] . "</h2 >";
                    echo $gift['gift_description'];
                    echo "<h2>" . $gift['gift_price'] . "€</h2 >";


                    echo "

                                        </div>
                                    </div>
                                    <div ng-controller='ModalCommentCtrl'>
                                        <script type='text/ng-template' id='comments.html'>
                                            <div class='modal-header'>
                                                <h3 class='modal-title'>Kommentaarid</h3>
                                            </div>

                                        </script>

                                        <button class='btn btn-default btn-sm' ng-click='open('lg')'>
                                            Kommentaarid
                                        </button>
                                    </div>

                                </a>";
                        }
                        ?>

                            </div>
                </tab>


            </tabset>

        </div>
    </div>
    </div>
    </div>

    <!-- 2 TAB 2        2 TAB 2  ================================================================= -->

    <div ng-show="tabs.isSet(2)">
        <div class="events">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div ng-controller="CollapseDemoCtrl">
                            <div class="col-md-6">

                                <form>

                                    <div class="form-group">
                                        <label for="name">Pealkiri</label>
                                        <input type="text" ng-model="heading" class="form-control"
                                               id="exampleInputEmail1"
                                               placeholder="Ürituse nimi">
                                    </div>

                                    <div class="form-group">
                                        <label for="descrition">Ürituse kirjeldus</label>
                                        <textarea class="form-control" ng-model="description" rows="3"></textarea>
                                    </div>

                                    <div ng-controller="ModalDemoCtrl">
                                        <script type="text/ng-template" id="myModalContent.html">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Ürituse asukoht</h3>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d32464.833613291285!2d24.744077886013756!3d59.43220559995476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2see!4v1428521236008"
                                                        width="100%" height="400" frameborder="0"
                                                        style="border:0"></iframe>
                                            </div>
                                        </script>

                                        <button class="btn btn-default" ng-click="open('lg')">Märkige kaardile ürituse
                                            asukoht
                                        </button>
                                    </div>
                                    <hr/>
                                    <button class="btn btn-primary" type="submit">Lisa üritus</button>
                                </form>


                            </div>
                            <div class="col-md-6">
                                <div ng-controller="DatepickerDemoCtrl">

                                    <!--  Chose date output
                                            <pre>Valitud kuupäev: <em>{{dt | date:'fullDate' }}</em></pre>
                                    -->


                                    <h4>Valige kellaaeg ja kuupäev</h4>

                                    <div ng-controller="TimepickerDemoCtrl">

                                        <timepicker ng-model="mytime" ng-change="changed()" hour-step="hstep"
                                                    minute-step="mstep" show-meridian="ismeridian"></timepicker>

                                        <!-- Chosen time output
                                                <pre class="alert alert-info">Time is: {{mytime | date:'shortTime' }}</pre>
                                        -->

                                    </div>

                                    <div style="display:inline-block; min-height:290px;">
                                        <datepicker ng-model="dt" min-date="minDate" show-weeks="true"
                                                    class="well well-sm"></datepicker>
                                    </div>
                                </div>
                                <!-- Collapse tab

                                <button class="btn btn-default" ng-click="isCollapsed = !isCollapsed">Ürituse aja ja kuupäeva
                                    sisestamine
                                </button>
                                <hr>
                                <div collapse="isCollapsed">
                                    <div class="well well-lg">

                                    </div>
                                    -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END TAB 2 -->
    </div>

</section>
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
<script type="text/javascript">
    $("#submit").click( function() {
        $.post( $("#attendForm").attr("action"),
            $("#attendForm :input").serializeArray(),
            function(info){ $("#result").html(info);
            });
        clearInput();
    });

    $("#attendForm").submit( function() {
        return false;
    });
    function clearInput() {
        $("#attendForm :input").each( function() {
            $(this).val('');
        });
    }
</script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCasRZV40wstmFA-Tu6SbYEgiZneL1uLFs">
</script>
<script type="text/javascript">
    function initialize() {
        var mapOptions = {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

</body>

</html>