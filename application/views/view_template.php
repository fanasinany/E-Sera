<?php
defined('BASEPATH') OR exit('No direct script access allowed');
switch ($content) {
  case 'inscription_page':
    $title = "E-SERA - Inscription";
    break;
  case 'connexion_page':
    $title = "E-SERA - Connexion";
    break;
  case 'profil_page':
    $title = "E-SERA - Profil";
  break;
  case 'amis_page':
    $title = "E-SERA - Amis";
  break;
  default:
    $title = "E-SERA";
    break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
    <?php if(isset($title)) echo $title;?>
  </title>
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
  <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css') ?>"/>
  <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>" ></script>
  <script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>" ></script>
  <script>
    var site_url = "<?= base_url() ?>";
  </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href=""><?php if(isset($title)) echo $title;?></a>
    <div class="navbar-nav ml-auto">
      <?php if(isset($_SESSION["id_util"]) && $_SESSION["id_util"] != "" && $_SESSION["logged_in"]): ?>
        <a class="nav-link text-dark" href="<?= base_url('index.php/Profil') ?>"><i class="fas fa-user-circle"></i></a>
        <a class="nav-link text-dark" href="<?= base_url('index.php/Amis') ?>"><i class="fas fa-user-friends"></i></a>
        <a class="nav-link text-dark" href="#"><i class="fas fa-envelope"></i></a>
        <a class="nav-link text-dark" href="#"><i class="fas fa-bell"></i></a>
        <div class="nav-link ml-lg-5 active font-weight-bold">
          <?= $_SESSION["pseudo"]?>
        </div>
        <a class="nav-link" href="<?= base_url('index.php/Connexion/logout') ?>"><i class="fas fa-sign-out-alt"></i></a>
      <?php else: ?>
        <a class="nav-link <?= ($content == 'inscription_page') ? "active" : "";?> " href="<?= base_url('index.php/Inscription') ?>">S'inscrire</a>
        <a class="nav-link <?= ($content == 'connexion_page') ? "active" : "";?>" href="<?= base_url('index.php/Connexion') ?>">Se connecter</a>
      <?php endif ?>
    </div>
  </div>
</nav>

<div class="container mt-4">

    <?php $this->load->view($content); ?>

</div>

</body>
</html>