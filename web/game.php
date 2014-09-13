<?php
$title  = 'Spacegame';
?>
<?php require_once __DIR__.'/header.php'?>

<?php require_once __DIR__.'/scripts.php'?>

<div id="interface">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h1 class="text-center header1"><?= _('Your name')?></h1>

            </div>
            <div class="col-md-3 col-xs-3"></div>

            <div class="col-md-6 col-xs-6">
                <input class="form-control" type="text" >
            </div>
            <div class="col-md-3 col-xs-3"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
            <h1 class="text-center header1"><?= _('Choose a faction')?></h1>

            </div>
            <div class="col-md-4 col-xs-4 text-center">
                <img src="assets/img/faction1.jpg" class="faction img-responsive">
            </div>
            <div class="col-md-4 col-xs-4 text-center">
                <img src="assets/img/faction2.jpg" class="faction selected img-responsive">
            </div>
            <div class="col-md-4 col-xs-4 text-center">
                <img src="assets/img/faction3.jpg" class="faction img-responsive">
            </div>
        </div>
    </div>


</div>
<div id="scene"></div>

<?php require_once __DIR__.'/universe.php'?>

<?php require_once __DIR__.'/footer.php'?>