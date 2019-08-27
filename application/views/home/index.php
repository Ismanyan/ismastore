
  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-3">
        <div class="list-group">
          <div class="list-group-item mt-5"><h3>Kategori</h3></div>
          <?php foreach($kategori as $key) : ?>
           <a href="<?= base_url('kategori/'.$key['nama']) ?>" class="list-group-item"><?= $key['nama'] ?></a>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-5" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid w-100" src="<?= base_url('assets/img/banner/1.png') ?>" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid w-100" src="<?= base_url('assets/img/banner/2.jpeg') ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid w-100" src="<?= base_url('assets/img/banner/3.jpg') ?>" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          <?php foreach($barang as $key) : ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="<?= base_url('views/index/'.$key['id']) ?>"><img class="card-img-top" src="<?= base_url('assets/img/barang/'.$key['foto_barang']); ?>" alt="" style="max-height:250px;"></a>
              <div class="card-body">
                <h4 class="card-title" style="white-space: nowrap; width: 100%;overflow: hidden; text-overflow: ellipsis;">
                  <a href="<?= base_url('views/index/'.$key['id']) ?>" style="text-decoration:none; color:#28a745;"><?= $key['nama_barang'] ?></a>
                </h4>
                <!-- Heading -->
                <h5 class="mt-2">Rp.<?= number_format($key['harga_barang'],0); ?></h5>
                <small><?= $key['nama_toko'] ?></small>
                <br>
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
