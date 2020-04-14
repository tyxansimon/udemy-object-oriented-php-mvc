<?php require APPROOT .'/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?= flash('register_success'); ?>
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?= URLROOT; ?>/users/login" method="POST" class="form">
          <fieldset class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?= !empty($data['email_error']) ? "is-invalid" : ""; ?>" value="<?= $data['email']; ?>">
            <div class="invalid-feedback"><?= $data['email_error']; ?></div>
          </fieldset>
          <fieldset class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?= !empty($data['password_error']) ? "is-invalid" : ""; ?>" value="<?= $data['password']; ?>">
            <div class="invalid-feedback"><?= $data['password_error']; ?></div>
          </fieldset>
          <div class="row">
            <div class="col">
              <a href="<?= URLROOT; ?>/users/register" class="btn btn-light btn-block">No account? Register</a>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-success btn-block">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT .'/views/inc/footer.php'; ?>
