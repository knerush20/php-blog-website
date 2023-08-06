<div class="col-12 col-md-12 err">
<?php if ( count($errMsg) > 0 ): ?>
<ul>
    <?php foreach ( $errMsg as $err ) : ?>
        <li> <?=$err;?> </li>
    <?php endforeach;?>
</ul>

<?php endif; ?>
</div>