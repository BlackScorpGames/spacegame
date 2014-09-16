<?php
$title  = 'Spacegame';
require_once __DIR__.'/../bootstrap.php';
$factions = include __DIR__.'/../config/factions.php';
$viewFactionsRequest = new \SpaceGame\Request\ViewFactionsRequest();
$viewFactionsResponse = new \SpaceGame\Response\ViewFactionsResponse();
$viewFactionsUseCase = new \SpaceGame\UseCase\ViewFactionsUseCase($factions);
$viewFactionsUseCase->process($viewFactionsRequest,$viewFactionsResponse);

?>
<?php require_once __DIR__.'/header.php'?>

<?php require_once __DIR__.'/scripts.php'?>

<div class="new-game-form">
    <form id="new-game">

        <input type="text" class="form-control" placeholder="<?= _('Your name') ?>">
        <ul class="faction-selection">
        <?php foreach($viewFactionsResponse->factions as $faction):?>
            <li class="faction <?= $faction->name?>">
                <img src="assets/img/<?= $faction->name?>.png">
                <div class="faction-description">
                    <?= $faction->description ?>
                </div>
            </li>
        <?php endforeach;?>
        </ul>
    </form>
</div>

<div id="scene"></div>

<?php require_once __DIR__.'/universe.php'?>

<?php require_once __DIR__.'/footer.php'?>