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
        <div class="card mt-5">
          <img class="card-img-top img-fluid" src="<?= base_url('assets/img/barang/'.$barang['foto_barang']) ?>" alt="">
          <div class="card-body">
            <h3 class="card-title"><?= $barang['nama_barang'] ?></h3>
            <!-- RATING -->
            <span class="text-warning">
              <?php for ($i=0; $i < 5; $i++) : ?>
                <?php if($i < $barang['rating_barang']) : ?>
                &#9733;
                  <?php else : ?>
                  &#9734;
                <?php endif; ?>
              <?php endfor; ?>
            </span>
            <p><?= $barang['rating_barang'] ?> Transaksi sukses</p>
            <h4 class="mb-4">Rp.<?= number_format($barang['harga_barang'],0); ?></h4>
            <p class="card-text mt-5"><?= $barang['desc_barang'] ?></p>
            <!-- Button -->
            <div class="row">
              <div class="col-md-2 pt-2">
                <a href="<?= base_url('user/chat/'.$barang['nama_barang']) ?>"  class="btn btn-secondary w-100">Chat</a>
              </div>
              <div class="col-md-2 pt-2">
                <a href="<?= base_url('user/addwishlist/'.$barang['nama_barang'].'/'.$barang['id']) ?>"  class="btn btn-secondary w-100">Wishlist</a>
              </div>
              <div class="col-md-4 pt-2">
                <a href="<?= base_url('user/addcart/'.$barang['nama_barang'].'/'.$barang['id']) ?>" class="btn btn-success w-100">Add to cart</a>
              </div>
              <div class="col-md-4 py-2">
                <a href="<?= base_url('user/index') ?>" class="btn btn-outline-success w-100">Buy</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->

        <!-- <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div>
        </div> -->
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
