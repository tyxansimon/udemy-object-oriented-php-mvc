<?php require APPROOT .'/views/inc/header.php'; ?>
  <div class="card card-body bg-light mt-5">
    <h2>Add post</h2>
    <p>Create a post with this form.</p>
    <form action="<?= URLROOT; ?>/posts/add" method="POST" class="form">
      <fieldset class="form-group">
        <label for="title">Title: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?= !empty($data['title_error']) ? "is-invalid" : ""; ?>" value="<?= $data['title']; ?>">
        <div class="invalid-feedback"><?= $data['title_error']; ?></div>
      </fieldset>
      <fieldset class="form-group">
        <label for="body">Body: <sup>*</sup></label>
        <textarea type="body" name="body" class="form-control form-control-lg <?= !empty($data['body_error']) ? "is-invalid" : ""; ?>"><?= $data['body']; ?></textarea>
        <div class="invalid-feedback"><?= $data['body_error']; ?></div>
      </fieldset>
      <div class="row">
        <div class="col">
          <a href="<?= URLROOT; ?>/posts" class="btn btn-light btn-block"><i class="fa fa-chevron-left"></i> Back</a>
        </div>
        <div class="col">
          <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
      </div>
    </form>
  </div>
<?php require APPROOT .'/views/inc/footer.php'; ?>
