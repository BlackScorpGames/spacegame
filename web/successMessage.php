<?php if(!$response->failed && $response->proceed):?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <ul >
            <?php foreach($response->messages as $message):?>
                <li> <?= _($message) ?></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>