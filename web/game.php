<?php
$title  = 'Spacegame';
?>
<?php require_once __DIR__.'/header.php'?>

<?php require_once __DIR__.'/scripts.php'?>

<div id="interface">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-3"></div>

            <div class="col-md-6 col-xs-6">
                <input class="form-control">
            </div>
            <div class="col-md-3 col-xs-3"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <ul class="fraction-selector clearfix">
                    <li class="fraction test1 selected"></li>
                    <li class="fraction test1"></li>
                </ul>

            </div>
        </div>
    </div>


</div>
<div id="scene"></div>

<?php require_once __DIR__.'/universe.php'?>

<?php require_once __DIR__.'/footer.php'?>