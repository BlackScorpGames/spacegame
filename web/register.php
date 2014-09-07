<?php
require_once __DIR__ . '/../bootstrap.php';
$title = 'Spacegame';
?>

<?php require_once __DIR__ . '/header.php'; ?>
<?php require_once __DIR__ . '/banner.php'; ?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><?= _('Create new account') ?></div>
            <div class="panel-body">
                <form role="form" method="POST">
                    <div class="form-group">
                        <label for="email"><?= _('Email address') ?></label>
                        <input type="email"  name="email" class="form-control" id="email"
                               placeholder="<?= _('Your email') ?>">
                    </div>
                    <div class="form-group">
                        <label for="password"><?= _('Password') ?></label>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="<?= _('Password') ?>">
                    </div>
                    <div class="form-group">
                        <label for="passwordConfirm"><?= _('Password confirm') ?></label>
                        <input type="password" name="passwordConfirm"class="form-control" id="passwordConfirm"
                               placeholder="<?= _('Password') ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type="submit" name="register"><?= _('Register')?></button>
                        </div>
                </form>
            </div>
        </div>
    </div>



<?php require_once __DIR__ . '/footer.php'; ?>