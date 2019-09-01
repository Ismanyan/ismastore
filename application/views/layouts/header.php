<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?= base_url('assets/img/logo/favicon.png') ?>" type="image/x-icon">
  <title><?= $title ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/shop-homepage.css') ?>" rel="stylesheet">

</head>

<body>

 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url(); ?>">Ismastore</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
          </form>
        </ul>
		    <ul class="navbar-nav ml-auto">
          <!-- IF .... -->
          <?php if(! $this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/login'); ?>">Masuk</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('home/daftar'); ?>">Daftar</a>
          </li>
          <?php elseif($this->session->userdata('logged_in')) : ?>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $user_info['nama'] ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url('user/profile') ?>">Profile</a>
              <a class="dropdown-item" href="<?= base_url('user/wishlist') ?>">Wishlist</a>
              <a class="dropdown-item" href="<?= base_url('user/cart') ?>">My Cart</a>
              <?php if($this->session->userdata('role') !== NULL && $this->session->userdata('role') == 1) : ?>
              <a class="dropdown-item" href="<?= base_url('user/manage') ?>">Kelola Toko</a>
              <?php endif; ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  