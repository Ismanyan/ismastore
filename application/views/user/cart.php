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
                <ul class="list-group mt-3">
                <?php foreach($cart as $key) : ?>
                    <a href="<?= base_url('views/produk/'.$key['id']) ?>" style="text-decoration:none; color:black;">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= str_replace("%20"," ",$key['nama_barang']) ?>
                        <a class="badge badge-primary ml-auto mr-2" href="#">Rp.<?= number_format($key['harga_barang'],0); ?></a>
                        <a class="badge badge-warning mr-2" href="#"><?= $key['jumlah'] ?></a>
                        <a class="badge badge-danger badge-pill" href="<?= base_url('user/deletecart/'.$key['id_cart']) ?>" onclick="return alert('Yakin ingin menghapus ?');">Delete</a>
                      </li>
                    </a>
                <?php $price =($key['harga_barang']*$key['jumlah']) + $price; endforeach; ?>
                  <a href="" class="btn btn-primary w-100 mt-3" data-toggle="modal" data-target="#checkout">Bayar Sekarang</a>
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
                            <input type="hidden" value="<?= $price ?>" name="harga">
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
                              <input type="text" id="price" class="form-control" value="Rp.<?= number_format($price,0) ?>" readonly>
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
                </ul>

              <?php else : ?>
              <div class="alert alert-danger mt-3">
                  belum ada barang pada cart
              </div>
            <?php endif; ?>
        </div>
      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
