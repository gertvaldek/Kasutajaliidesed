<?php echo '
            <div class="events">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div ng-controller="CollapseDemoCtrl">
                            <div class="col-md-6">

                                <form action="system/newEvent.php" method="post">

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

                                        <button class="btn btn-default" ng-click="open("lg")">Märkige kaardile ürituse
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
                                            <pre>Valitud kuupäev: <em>{{dt | date:"fullDate" }}</em></pre>
                                    -->


                                    <h4>Valige kellaaeg ja kuupäev</h4>

                                    <div ng-controller="TimepickerDemoCtrl">

                                        <timepicker ng-model="mytime" ng-change="changed()" hour-step="hstep"
                                                    minute-step="mstep" show-meridian="ismeridian"></timepicker>



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
';
?>