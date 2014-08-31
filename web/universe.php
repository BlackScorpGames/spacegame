<?php
require_once __DIR__.'/../bootstrap.php';
require_once __DIR__.'/../config/universe.php';

$username = 'test';

$request = new \SpaceGame\Request\ViewUniverseRequest($username,$galaxies['amount']['max'],$galaxies['amount']['min'],$universe['max'],$universe['min']);
$response = new \SpaceGame\Response\ViewUniverseResponse();
$useCsae = new \SpaceGame\UseCase\ViewUniverseUseCase();

$useCsae->process($request,$response);
?>
<?php include 'header.php'?>
<script>
    var galaxies = [];
    <?php foreach($response->galaxies as $galaxy): ?>
        var galaxy = {
            posX:<?= $galaxy->posX ?>,
            posY:<?= $galaxy->posY ?>,
            posZ:<?= $galaxy->posZ ?>,
            name:'<?= $galaxy->galaxyName?>'
        }
    galaxies.push(galaxy);
    <?php endforeach ?>
</script>
<?php include 'footer.php'?>