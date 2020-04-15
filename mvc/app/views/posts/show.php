<?php require APPROOT .'/views/inc/header.php'; ?>
  <a href="<?= URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-chevron-left"></i> Back</a>
  <br>
  <h1><?= $data['post']->title ?></h1>
  <div class="bg-secondary text-white p-2 mb-3">
    Written by <?= $data['user']->name ?>, created at <?= $data['user']->created_at ?>
  </div>
  <p><?= $data['post']->body ?></p>

  <?php
    if($data['post']->user_id == $_SESSION['user_id']) :
      // Post belongs to user
    ?>
      <hr>
      <a href="<?= URLROOT ?>/posts/edit/<?= $data['post']->id ?>" class="btn btn-dark">
        Edit
      </a>

      <form class="float-right" action="<?= URLROOT ?>/posts/delete/<?= $data['post']->id ?>" method="POST">
        <input type="submit" value="Delete" class="btn btn-danger">
      </form>
    <?php
    endif;
  ?>

<?php require APPROOT .'/views/inc/footer.php'; ?>
