<?php include 'system/connection.php'; ?>


<html ng-app="ui.bootstrap.demo">

<?php include 'include/head.php'; ?>

<body>
<section class="tabs" ng-controller="TabsController as tabs">

    <?php include 'include/nav.php'; ?>

    <!-- TAB 1            TAB 1
       =====================  -->


    <!--
<?php
    /*
        $result = mysql_query('SELECT * FROM user');
        while ($row = mysql_fetch_array($result)) {

            echo $row['id'];
            echo $row['e_mail'];
            echo $row['reg_date'];

        }
        */ ?>  -->


    <div ng-show="tabs.isSet(1)">
        <div class="events" ng-controller="TabsDemoCtrl">
            <h4>Nimekirjas on toodud kõik sellel aastal toimuvad üritused
                <small> Soovitame osaleda!</small>
            </h4>


            <p id="demo"></p>

            <div class="list-group">
                <?php
                $q_event = mysql_query('SELECT title, birthday_age, date, time, venue, description FROM event ORDER BY id DESC ');
                while ($event = mysql_fetch_array($q_event)) {

                    echo "<a href='' class='list-group-item'>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-3'><img src='images/party1.jpg' alt='Birth1' class='img-thumbnail'></div>";
                    echo "<div class='col-md-9'>";
                    echo "<h4>" . $event['title'] . " <span class='label label-primary'>" . $event['birthday_age'] . "</span></h4>";
                    echo "<span class='glyphicon glyphicon-time' aria-hidden='true'></span> " . $event['date'];
                    echo "  <span class='glyphicon glyphicon-map-marker' aria-hidden='true''></span>" . $event['venue'];
                    echo "<hr/>";
                    echo $event['description'];
                    echo " </div></div></a>";

                }
                ?>


                <!--                <a href="#" class="list-group-item">
                <div class="row">
                    <div class="col-md-3"><img src="images/party2.jpg" alt="Birth1" class="img-thumbnail"></div>
                    <div class="col-md-9"><h4>Pireti Sünnipäev <span class="label label-primary">26</span></h4>
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 12. mai 2015, 21:00 <span
                                class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Suve tn 5, Tallinn
                        <hr/>
                        Lorem ipsum dolor sit amet.
                    </div>
                </div>
            </a>
            <a href="#" class="list-group-item">
                <div class="row">
                    <div class="col-md-3"><img src="images/party3.jpg" alt="Birth1" class="img-thumbnail"></div>
                    <div class="col-md-9"><h4>Marii Sünnipäev Ööklubis <span class="label label-primary">12</span>
                    </h4>
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 25. juuni 2015, 19:00
                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Raekoja plats 5,
                        Tallinn
                        <hr/>
                        Lorem ipsum dolor sit amet.
                    </div>
                </div>
            </a>-->
            </div>
        </div>

    </div>

    <!-- 2 TAB 2        2 TAB 2
    // ====================== -->

    <div ng-show="tabs.isSet(2)">
        <div class="events">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div ng-controller="CollapseDemoCtrl">
                            <div class="col-md-6">

                                <form action="system/create_event.php" method="post">

                                    <div class="form-group">
                                        <label for="name">Pealkiri</label>
                                        <input name="title" type="text" class="form-control"
                                               id="exampleInputEmail1"
                                               placeholder="Ürituse nimi" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Toimumiskoht</label>
                                        <input name="venue" type="text" class="form-control"
                                               id="exampleInputEmail1"
                                               placeholder="Asukoht" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Vanus</label>
                                        <input name="age" type="text" class="form-control"
                                               id="exampleInputEmail1"
                                               placeholder="Sünnipäevalapse vanus">
                                    </div>

                                    <div class="form-group">
                                        <label for="descrition">Ürituse kirjeldus</label>
                                        <textarea name="description"class="form-control" ng-model="description" rows="3" required></textarea>
                                    </div>
                                    <div ng-controller="ModalDemoCtrl">
                                        <script type="text/ng-template" id="myModalContent.html">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Ürituse asukoht</h3>
                                            </div>
                                            <div class="modal-body">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d32464.833613291285!2d24.744077886013756!3d59.43220559995476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2see!4v1428521236008"
                                                    width="100%" height="400" frameborder="0"
                                                    style="border:0"></iframe>
                                            </div>
                                        </script>

                                        <button class="btn btn-default" ng-click="open('lg')">Märkige kaardile ürituse
                                            asukoht
                                        </button>
                                    </div>
                                    <hr/>
                                    <button type="submit" class="btn btn-primary">Lisa üritus</button>
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
</body>

</html>