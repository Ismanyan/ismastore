<div class="container my-5">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
    Add New
    </button>

    <!-- Table Data -->
    <table class="table table-bordered">
        <thead class="bg-success text-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah Beli</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($barang as $key) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><img src="<?= base_url('assets/img/barang/'.$key['foto_barang']) ?>" alt="Barang" width="100"></td>
                <td><?= $key['nama_barang'] ?></td>
                <td>Rp.<?= number_format($key['harga_barang'],0); ?></td>
                <td><?= $key['jumlah_beli'] ?></td>
                <td>
                    <a href="<?= base_url('views/produk/'.$key['id']) ?>" class="btn btn-primary">Detail</a>
                    <a href="#" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('user/delete/'.$key['id']) ?>" class="btn btn-danger" onclick="return alert('Yakin menghapus data ?');">Delete</a>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
            <div class="input-group mb-2">
                <label class="input-group-btn">
                  <span class="btn btn-success">
                    Browse<input type="file" id="media" name="gambar" style="display: none;" required>
                  </span>
                </label>
                <input type="text" class="form-control input-lg" size="40" placeholder="Gambar barang..." readonly required>
              </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Barang">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Harga Barang">
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="4" placeholder="Deskripsi Barang"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>