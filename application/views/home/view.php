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
                <a href="<?= base_url('user/addcart/'.$barang['id']) ?>" class="btn btn-success w-100">Add to cart</a>
              </div>
              <div class="col-md-4 py-2">
                <a href="#" class="btn btn-outline-success w-100" data-toggle="modal" data-target="#checkout">Buy</a>
                <!-- Add Modal -->
                  <div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="checkoutLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="checkoutLabel">Checkout</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="post" action="<?= base_url('user/checkout') ?>">
                          <div class="modal-body">
                          <?php if($address->num_rows() != 0) : ?>
                            <!-- Hidden input -->
                            <input type="hidden" value="<?= $address->result_array()[0]['id_alamat'] ?>" name="id_alamat">
                            <input type="hidden" value="<?= $barang['harga_barang'] ?>" name="harga">
                            <!-- accepter -->
                            <div class="form-group">
                              <label for="accepter">Nama Penerima</label>
                              <input type="text" class="form-control" id="accepter" value="<?= $address->result_array()[0]['nama_penerima'] ?>" readonly>
                            </div>
                            <!-- Provinsi -->
                            <div class="form-group">
                              <label for="provinsi">Provinsi</label>
                              <?php foreach($getProv as $key) : ?>
                                  <?php if($key['id_provinsi'] == $address->result_array()[0]['id_provinsi']) : ?>
                                  <input type="text" class="form-control" id="provinsi" value="<?= $key['nama_provinsi'] ?>" readonly>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <!-- Kota -->
                            <div class="form-group">
                              <label for="kota">Kota</label>
                                <?php foreach($getKota as $key) : ?>
                                  <?php if($key['id_kota'] == $address->result_array()[0]['id_kota']) : ?>
                                  <input type="text" class="form-control" id="kota" value="<?= $key['nama_kota'] ?>" readonly>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <!-- Zip Kode -->
                            <div class="form-group">
                              <label for="zipkode">Kode Pos</label>
                              <input type="text" class="form-control" id="zipkode" value="<?= $address->result_array()[0]['kode_pos'] ?>" readonly>
                            </div>
                            <!-- Kecamatan -->
                            <div class="form-group">
                              <label for="kecamatan">Kecamatan</label>
                              <input type="text" class="form-control" id="kecamatan" value="<?= $address->result_array()[0]['kecamatan'] ?>" readonly>
                            </div>
                            <!-- Alamat -->
                            <div class="form-group">
                              <label for="alamat">Alamat Lokasi</label>
                              <textarea class="form-control" id="alamat" rows="3" name="alamat" readonly><?= $address->result_array()[0]['alamat'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="price">Harga Barang</label>
                              <input type="text" id="price" class="form-control" value="Rp.<?= number_format($barang['harga_barang'],0); ?>" readonly>
                            </div>
                          <?php else: ?>
                            <div class="alert alert-warning p-4" role="alert">
                              Belum ada alamat pengiriman. <a href="#" class="alert-link">klik disini</a> untuk menambahkan alamat
                            </div>
                          <?php endif; ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
           Review Pelanggan
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <!-- RATING -->
            <span class="text-warning">
              <?php for ($i=0; $i < 5; $i++) : ?>
                <?php if($i < 3) : ?>
                &#9733;
                  <?php else : ?>
                  &#9734;
                <?php endif; ?>
              <?php endfor; ?>
            </span>
            <br>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
          </div>
          <!-- <hr> -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
