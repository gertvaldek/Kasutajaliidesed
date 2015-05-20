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
                                               placeholder="Ürituse nimi" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Toimumiskoht</label>
                                        <input name="venue" type="text" class="form-control"
                                               placeholder="Asukoht" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Vanus</label>
                                        <input name="age" type="text" class="form-control"

                                               placeholder="Sünnipäevalapse vanus">
                                    </div>

                                    <div class="form-group">
                                        <label for="descrition">Ürituse kirjeldus</label>
                                        <textarea name="description"class="form-control" ng-model="description" rows="3" required></textarea>
                                    </div>
                                    <hr/>



                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                        <label for="name">Kuupäev</label>
                                        <input name="date" type="text" class="form-control"
                                               placeholder="Ürituse kuupäev" required>
                                    </div>
                                     <div class="form-group">
                                        <label for="name">Kellaaeg</label>
                                        <input name="time" type="text" class="form-control"
                                               placeholder="Ürituse kellaaeg" required>
                                    </div></p>
                                                                <button type="submit" class="btn btn-primary">Lisa üritus</button>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
';
?>