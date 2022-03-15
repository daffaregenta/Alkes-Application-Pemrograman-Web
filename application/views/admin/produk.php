<br>
<div class="pull-right">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah Produk</button>
</div>
<br>
<h2 style="margin-top: 15px;margin-bottom: 0; text-align: left;">Produk</h2>
<div class="clearfix"></div>
<br>

<table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($data as $d ) {?>
            <tr>
                <form action="">
                    <td>
                        <?php echo $no++ ?>
                    </td>
                    <td>
                        <?php echo $d['nama_produk']; ?>
                    </td>
                    <td>
                        <?php echo $d['deskripsi']; ?>
                    </td>
                    <td>
                        <?php echo $d['harga']; ?>
                    </td>
                    <td>
                        <img src="<?=base_url()?>assets/images/<?php echo $d['gambar']; ?>" style="width:150px; height:150px;" alt="foto">
                    </td>
                    <td>
                        <?php echo $d['kategori']; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $d['id_produk']; ?>">Edit
                        </button>
                    </td>
                    <td><a type="button" class="btn btn-danger" href="hapusproduk/<?php echo $d['id_produk']; ?>" onClick="return confirm('Are you sure to delete this?')">Delete</a></td>
                </form>
            </tr>
            <?php } ?>
    </tbody>
</table>
</div>
</div>


<?php $no=1; foreach ($data as $d ) {?>
    <div class="modal fade" id="edit<?php echo $d['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                        <h2>Edit Produk</h2></center>
                </div>
                <div class="modal-body">
                    
                    <form method="post" action="<?php echo base_url('home/editproduk/'); ?>" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="Id Produk" name="nip" value="<?php echo $d['id_produk']; ?>" required>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Produk</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama" name="nama" value="<?php echo $d['nama_produk']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Deskripsi</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Deskripsi" name="deskripsi" value="<?php echo $d['deskripsi']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Harga</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Harga" name="harga" value="<?php echo $d['harga']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Kategori</label>
                            <select class="form-control" id="formGroupExampleInput2" name="kategori" required>
                                <?php foreach ($dataJ as $c ): ?>
                                    <option value="<?php echo $c['id']; ?>">
                                        <?php echo $c['nama_kategori']; ?>
                                    </option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Gambar<b></span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto" accept='image/*' required>
                                <label class="custom-file-label text-left" for="foto">Choose file</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>

        
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h2>Tambah Produk</h2></center>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo base_url('home/tambahproduk/'); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama Produk</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Deskripsi</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Deskripsi" name="deskripsi" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Harga</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Harga" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Kategori</label>
                                <select class="form-control" id="formGroupExampleInput2" name="kategori" required>
                                    <?php foreach ($dataJ as $c ): ?>
                                         <option value="<?php echo $c['id']; ?>">
                                        <?php echo $c['nama_kategori']; ?>
                                    </option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Gambar</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto" accept='image/*' required>
                                    <label class="custom-file-label text-left" for="foto">Choose file</label>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
                        </form>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#table').DataTable();
            });
        </script>
        <br><br>
        <br><br>
        <br><br>