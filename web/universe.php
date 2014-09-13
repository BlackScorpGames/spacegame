<?php
require_once __DIR__.'/../bootstrap.php';
require_once __DIR__.'/isLoggedIn.php';
require_once __DIR__.'/../config/universe.php';
$userId = $_SESSION['userId'];
$maximumAmount = $solarSystems['max'];
$minimumAmount = $solarSystems['min'];
$radiusX = $galaxy['radiusX'];
$radiusY = $galaxy['radiusY'];
$radiusZ = $galaxy['radiusZ'];

$request = new \SpaceGame\Request\ViewUniverseRequest($userId,$maximumAmount,$minimumAmount,$radiusX,$radiusY,$radiusZ);
$request->setSeed($seed);
$response = new \SpaceGame\Response\ViewUniverseResponse();
$useCase = new \SpaceGame\UseCase\ViewUniverseUseCase();

$useCase->process($request,$response);

?>

<script>
    var solarSystems = [];
    <?php foreach($response->solarSystems as $solarSystem): ?>
    var solarSystem = {
        posX:<?= $solarSystem->posX ?>,
        posY:<?= $solarSystem->posY ?>,
        posZ:<?= $solarSystem->posZ ?>,
        name:'<?= $solarSystem->solarSystemName?>'
    }
    solarSystems.push(solarSystem);
    <?php endforeach ?>
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/three.js/r68/three.min.js"></script>
<script src="assets/js/stats.js"></script>
<script src="assets/js/TrackballControls.js"></script>
<script src="assets/js/main.js"></script>