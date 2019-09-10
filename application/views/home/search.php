
  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-3">
        <div class="list-group">
          <div class="list-group-item mt-5"><h3>Kategori</h3></div>
          <?php foreach($kategori as $key) : ?>
           <a href="<?= base_url('search/kategori/'.$key['id']) ?>" class="list-group-item"><?= $key['nama'] ?></a>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- /.col-lg-3 -->
      <div class="col-lg-9">

        <div class="row mt-5">
          <?php if(count($barang) === 0) : ?>
          <div class="alert alert-danger w-100" style="margin-bottom:40%;">
            <p>Barang tidak dapat di temukan</p>
          </div>
          <?php endif; ?>
          <?php foreach($barang as $key) : ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="<?= base_url('views/produk/'.$key['id']) ?>"><img class="card-img-top" src="<?= base_url('assets/img/barang/'.$key['foto_barang']); ?>" alt="" style="max-height:250px;"></a>
              <div class="card-body">
                <h4 class="card-title" style="white-space: nowrap; width: 100%;overflow: hidden; text-overflow: ellipsis;">
                  <a href="<?= base_url('views/produk/'.$key['id']) ?>" style="text-decoration:none; color:#28a745;"><?= $key['nama_barang'] ?></a>
                </h4>
                <!-- Heading -->
                <h5 class="mt-2">Rp.<?= number_format($key['harga_barang'],0); ?></h5>
                <!-- RAting -->
                <small class="text-warning">  
                <?php for ($i=0; $i < 5; $i++) : ?>
                  <?php if($i < $key['rating_barang']) : ?>
                  &#9733;
                    <?php else : ?>
                    &#9734;
                  <?php endif; ?>
                <?php endfor; ?>
                </small>
                <!-- Total Beli -->
                <small class="text-mutted">(<?= $key['jumlah_beli'] ?>)</small>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->