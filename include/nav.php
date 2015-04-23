<?php
echo '
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li role="presentation"><a href ng-click="tabs.setTab(1)">Üritused</a>
                </li>
                <li role="presentation"><a href ng-click="tabs.setTab(2)">Loo uus üritus</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php">Logi välja</a>
                </li>

            </ul>
        </div>
    </div>
</nav>';
?>