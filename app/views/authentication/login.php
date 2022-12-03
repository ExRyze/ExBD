<?php require_once MAIN_HEAD ?>

<div class="position-absolute top-50 start-50 translate-middle bg-secondary card col-3">
  <form action="login/Clogin" method="post" class="card-body">
    <h4 class="text-center">Login</h4>
    <div class="border-bottom border-3 border-dark mb-3"></div>
    <?php Flasher::flasher() ?>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" class="form-control" id="username">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary col-12 mb-3">Login</button>
    <div class="col-12 text-center d-flex flex-column">
      <small>Don't have any account?</small>
      <small><a href="<?= BASE_URL.'/register' ?>">Register</a></small>
    </div>
  </form>
</div>

<?php require_once MAIN_FOOT ?>