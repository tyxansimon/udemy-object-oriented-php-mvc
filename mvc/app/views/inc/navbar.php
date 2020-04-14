<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?= URLROOT; ?>"><?= SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/pages/about">About</a>
        </li>
      </ul>
      <?php
        if(isset($_SESSION['user_name'])) :
      ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= URLROOT; ?>/users/logout"><strike>Logout</strike></a>
          </li>
        </ul>
      <?php
        else :
      ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= URLROOT; ?>/users/register">Register</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URLROOT; ?>/users/login">Login</a>
          </li>
        </ul>
      <?php
        endif;
      ?>
    </div>
  </div>
</nav>
