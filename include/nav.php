<?php


$q_us = mysql_query("SELECT id, firstname, lastname FROM users WHERE e_mail = '$active'");
$userq = mysql_fetch_array($q_us);

?>


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
            <ul class="nav navbar-nav navbar-right"> '?>
            <?php if ($_SESSION['active'] == true) { ?>
                    <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $userq['firstname'] . " " . $userq['lastname'] ; ?> </a></li>
                <li><a href="system/logout.php">Logi välja</a>
                </li>

            </ul> <?php } ?>
<?php echo '
        </div>
    </div>
</nav>';
?>