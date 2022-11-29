<?php require_once MAIN_HEAD ?>

<?php require_once MAIN_NAV ?>
<?php Flasher::flasher() ?>
<a href="<?= BASE_URL.'/login/logout' ?>" class="btn btn-danger">Logout</a>
<?php var_dump($_SESSION) ?>

<?php require_once MAIN_FOOT ?>