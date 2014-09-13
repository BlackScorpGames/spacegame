<?php
require_once __DIR__ . '/../bootstrap.php';
$title = 'Spacegame - Register';
$response = new \SpaceGame\Response\RegisterResponse();

if(isset($_POST['register'])){

    $request = new \SpaceGame\Request\RegisterRequest($_POST['email'],$_POST['password'],$_POST['passwordConfirm']);
    $useCase = new \SpaceGame\UseCase\RegisterUseCase($pdo(),$passwordHasher());
    $useCase->process($request,$response);
}
?>

<?php require_once __DIR__ . '/header.php'; ?>
<?php require_once __DIR__ . '/banner.php'; ?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><?= _('Create new account') ?></div>
            <div class="panel-body">
            <?php require_once __DIR__.'/successMessage.php' ?>
            <?php require_once __DIR__.'/errorMessage.php' ?>
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
                        <label for="passwordConfirm"><?= _('Password confirm') ?></label>
                        <input type="password" name="passwordConfirm"class="form-control" id="passwordConfirm"
                              value="<?= $response->passwordConfirm ?>" placeholder="<?= _('Password') ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type="submit" name="register"><?= _('Register')?></button>
                        </div>
                </form>
            </div>
        </div>
    </div>



<?php require_once __DIR__ . '/footer.php'; ?>