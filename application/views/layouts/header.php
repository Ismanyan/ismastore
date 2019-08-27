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
			
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('home/login'); ?>">Masuk</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="<?= base_url('home/daftar'); ?>">Daftar</a>
			</li>
        </ul>
      </div>
    </div>
  </nav>

  