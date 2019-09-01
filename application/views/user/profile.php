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
            <h3>Riwayat Pembelian</h3>
            <div class="alert alert-danger mt-3">
                belum ada riwayat pembelian
            </div>
        </div>
      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
