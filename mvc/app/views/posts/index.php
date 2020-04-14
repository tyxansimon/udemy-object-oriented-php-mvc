<?php require APPROOT .'/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6">
      <h1><?= $data['title']; ?></h1>
    </div>
    <div class="col-md-6 text-right">
      <a href="<?= URLROOT; ?>/posts/add" class="btn btn-primary">
        <i class="fa fa-pen"></i> Add post
      </a>
    </div>
  </div>
<?php require APPROOT .'/views/inc/footer.php'; ?>
