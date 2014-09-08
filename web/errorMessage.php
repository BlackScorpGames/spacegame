<?php if($response->failed):?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <ul >
            <?php foreach($response->errors as $error):?>
                <li> <?= _($error) ?></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>