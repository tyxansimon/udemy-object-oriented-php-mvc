<?php require APPROOT .'/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Create an account</h2>
        <p>Please fill out this form to register your account.</p>
        <form action="<?= URLROOT; ?>/users/register" method="POST" class="form">
          <fieldset class="form-group">
            <label for="name">Name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?= !empty($data['name_error']) ? "is-invalid" : ""; ?>" value="<?= $data['name']; ?>">
            <div class="invalid-feedback"><?= $data['name_error']; ?></div>
          </fieldset>
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
          <fieldset class="form-group">
            <label for="confirm_password">Confirm password: <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?= !empty($data['confirm_password_error']) ? "is-invalid" : ""; ?>" value="<?= $data['confirm_password']; ?>">
            <div class="invalid-feedback"><?= $data['confirm_password_error']; ?></div>
          </fieldset>
          <div class="row">
            <div class="col">
              <a href="<?= URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-success btn-block">Create your account</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT .'/views/inc/footer.php'; ?>
