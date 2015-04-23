<html ng-app="ui.bootstrap.demo">
<head>
    <title>Sünnipäevad</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/party.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.20/angular.min.js"></script>
    <script src="js/ui-bootstrap-tpls-0.12.1.min.js"></script>
    <script src='js/index.js'></script>
</head>

<body>
<section class="tabs" ng-controller="TabsController as tabs">

    <?php include 'include/nav.php'; ?>

    <!-- TAB 1            TAB 1 ==========================================================================  -->

    <div ng-show="tabs.isSet(1)">
        <form>
            <div class="backButton">
                <button type="button" class="btn btn-default" VALUE="Tagasi" onClick="history.go(-1);return true;">

				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true">
                </button>
            </div>
        </form>

        <div class="events" ng-controller="TabsDemoCtrl">
            <tabset justified="true">
                <tab heading="Info">

                    <div ng-controller="AccordionDemoCtrl">
                        <hr/>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">

                                    <div class="col-md-5">

                                        <img src="images/party1.jpg" alt="Pidu 1" class="img-thumbnail"></div>
                                    <div class="col-md-7">
                                        <h3>Mihkli Sünnipäev <span class="label label-primary">22</span></h3>
                                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 23. aprill
                                        2015, 18:00 <span class="glyphicon glyphicon-map-marker"
                                                          aria-hidden="true"></span> TTÜ Raamatukogu
                                        <hr/>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                        culpa qui officia deserunt mollit anim id est laborum.
                                        <hr/>

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
                                    <form ng-controller="FrmController">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2">Nimi</span>
                                            <input ng-model="txtcomment" type="text" class="form-control"
                                                   aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <button ng-click='btn_add();' type="submit" class="btn btn-primary">Märgi
                                            osalejaks
                                        </button>
                                        <hr/>
                                        <h4>Osalejad</h4>
                                        <table class="table table-striped">

                                            <tr ng-repeat="comnt in comment">
                                                <td>{{ comnt }}
                                                    <button type="button" style="float: right;"
                                                            ng-click="remItem($index)" class="close" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>


                                            </tr>

                                        </table>
                                    </form>

                                </div>
                                <div class="col-md-6">

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
                                        <span class="input-group-addon" id="sizing-addon2">Nimi</span>
                                        <input ng-model="name" type="text" class="form-control"
                                               aria-describedby="basic-addon1">

                                        <span class="input-group-addon" id="sizing-addon2">Kirjeldus</span>
                                        <input ng-model="description" type="text" class="form-control"
                                               aria-describedby="basic-addon1">
                                        <span class="input-group-addon" id="sizing-addon2">Hind</span>
                                        <input ng-model="price" type="text" class="form-control"
                                               aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <button ng-click='btn_add();' type="button" class="btn btn-primary">Lisa kingitus
                                    </button>
                                    <hr/>
                                    <div ng-repeat="gift in gifts">
                                        <a class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>
                                                        <button type="button" style="float: left;"
                                                                ng-click="remItem($index)" class="close"
                                                                aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    </p>

                                                    <h2>{{ gift.name }}</h2>
                                                    {{ gift.description }}
                                                    <h2>{{ gift.price }} €</h2>
                                                </div>
                                            </div>
                                            <div ng-controller="ModalCommentCtrl">
                                                <script type="text/ng-template" id="comments.html">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Kommentaarid</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form ng-controller="FrmController">
                                                            <div class="input-group">
                                                                <input placeholder="Kommentaar" ng-model="txtcomment"
                                                                       type="text" class="form-control"
                                                                       aria-describedby="basic-addon1">
                                                            </div>
                                                            <br>
                                                            <button ng-click='btn_add();' type="submit"
                                                                    class="btn btn-primary">Lisa
                                                            </button>

                                                            <hr/>
                                                            <table class="table table-striped">
                                                                <tr ng-repeat="comnt in comment">
                                                                    <td>{{ comnt }}
                                                                        <button type="button" style="float: right;"
                                                                                ng-click="remItem($index)" class="close"
                                                                                aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </script>

                                                <button class="btn btn-default btn-sm" ng-click="open('lg')">
                                                    Kommentaarid
                                                </button>
                                            </div>

                                        </a>
                                        <br/>
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-6">


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