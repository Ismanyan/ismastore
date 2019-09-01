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
            <h3>Wishlist</h3>
            <?php if(count($wishlist) !== 0) : ?>
                <ul class="list-group mt-3">
                <?php foreach($wishlist as $key) : ?>
                    <a href="<?= base_url('views/produk/'.$key['id_barang']) ?>" style="text-decoration:none; color:black;">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= str_replace("%20"," ",$key['nama_barang']) ?>
                        <a class="badge badge-danger badge-pill" href="<?= base_url('user/deletewishlist/'.$key['id']) ?>">Delete</a>
                      </li>
                    </a>
                <?php endforeach; ?>
                </ul>
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
