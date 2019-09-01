 <!-- Page Content -->
  <div class="container">

    <div class="row justify-content-md-center mt-5">
      <div class="col-lg-5">
        <div class="card p-5">
        <center>
            <img src="<?= base_url('assets/img/user/'.'profile.png') ?>" alt="" class="w-50 mb-3">
            <h3><?= $user_info['nama'] ?></h3>
            <hr>
            <p><?= $user_info['email'] ?></p>
            <p><?= $user_info['phone'] ?></p>
        </center>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-7 mt-md-0 mt-3">
        <div class="card p-5">
            <h3>My Cart</h3>
            <?php if(count($cart) !== 0) : ?>
                <?php foreach($cart as $key) : ?>
                    <div class="card">
                        <div class="col-md-4">
                            <img src="" alt="" srcset="">
                        </div>
                        <div class="col-md-8">
                            <h4><?= $key['nama_barang'] ?></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
              <?php else : ?>
              <div class="alert alert-danger mt-3">
                  belum ada barang yang di wishlist
              </div>
            <?php endif; ?>
        </div>
      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
