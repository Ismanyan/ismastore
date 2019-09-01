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
    <div class="row pl-4 w-100">
        <div class="col-md-4 mx-auto">
            <center>
            <a href="<?= base_url() ?>">
                <img src="<?= base_url('assets/img/logo/favicon.png') ?>" width="150" class="mb-5">
            </a>
            <form action="<?= base_url('auth/login') ?>" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" required >
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="pass" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>
            <p class="mt-3">Belum punya akun ? <a href="<?= base_url('home/daftar') ?>">Daftar Disini</a></p>
            </center>
        </div>
    </div>
  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>
