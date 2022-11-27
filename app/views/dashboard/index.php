<?php require_once TEMPLATES_HEAD ?>
  <h1><?= var_dump($_SESSION['user']) ?></h1>
  <a href="<?= BASE_URL.'/login/logout' ?>" class="btn btn-danger">Logout</a>
<?php require_once TEMPLATES_FOOT ?>