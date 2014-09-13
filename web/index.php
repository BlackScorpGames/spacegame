<?php

require_once __DIR__.'/../bootstrap.php';
$title = 'Spacegame';
$response = new \SpaceGame\Response\LoginResponse();



if(isset($_POST['login'])){

    $request = new \SpaceGame\Request\LoginRequest($_POST['email'],$_POST['password']);
    $useCase = new \SpaceGame\UseCase\LoginUseCase($pdo(),$passwordHasher());
    $useCase->process($request,$response);

    if(!$response->failed){
        $_SESSION['userId'] = $response->userId;
        header( "refresh:1;url=game.php" );
    }
}
?>

<?php require_once __DIR__.'/header.php'; ?>
<?php require_once __DIR__.'/banner.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php require_once __DIR__.'/successMessage.php' ?>
            <?php require_once __DIR__.'/errorMessage.php' ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-xs-9">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= _('Login')?>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST">
                        <div class="form-group">
                            <label for="email"><?= _('Email address') ?></label>
                            <input type="email"  name="email" class="form-control" id="email" value="<?= $response->email ?>" placeholder="<?= _('Your email') ?>">
                        </div>
                        <div class="form-group">
                            <label for="password"><?= _('Password') ?></label>
                            <input type="password" name="password" class="form-control" id="password"
                                   value="<?= $response->password ?>"    placeholder="<?= _('Password') ?>">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-default" type="submit" name="login"><?= _('Login')?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__.'/scripts.php'?>
<?php require_once __DIR__.'/footer.php'; ?>