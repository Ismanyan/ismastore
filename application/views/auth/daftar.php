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
            <!-- IF Alert -->
            <?php if(isset($status)) : ?>
            <div class="alert alert-primary" role="alert">
            Daftar berhasil. Silahkan login  <a href="<?= base_url('home/login') ?>" class="alert-link">disini</a>
            </div>
            <?php elseif(isset($err)) : ?>
            <div class="alert alert-danger" role="alert">
            Email telah terdaftar 
            </div>
            <?php endif; ?>
            <!-- End IF -->
            <form action="<?= base_url('auth/daftar') ?>" method="post">
                <?php if(isset($status)) : ?>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="No Hp" name="phone" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control validated" placeholder="Email" name="email" required>
                </div>
                    <!-- If not success -->
                    <?php else: ?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="<?= set_value('name') ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="No Hp" name="phone" value="<?= set_value('phone') ?>" required>
                        <small  class="form-text text-danger"><?= form_error('phone') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control validated" placeholder="Email" name="email" value="<?= set_value('email') ?>" required>
                        <small  class="form-text text-danger"><?= form_error('email') ?></small>
                    </div>
                <?php endif; ?>
                    <div class="form-group">
                        <input type="password" class="form-control"  placeholder="Password" name="pass" required>
                        <small  class="form-text text-danger"><?= form_error('pass') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  placeholder="Konfirmasi Password" name="passcon" required>
                        <small  class="form-text text-danger"><?= form_error('passcon') ?></small>
                    </div>
                <button type="submit" class="btn btn-success w-100">Daftar</button>
            </form>
            <p class="mt-3 mb-5">Sudah punya akun ? <a href="<?= base_url('home/login') ?>">Login Disini</a></p>
            </center>
        </div>
    </div>
  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>
