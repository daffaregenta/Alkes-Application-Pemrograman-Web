<h2><?php echo $dataJ['nama_produk'];?></h2>
<form method="post" action="<?php echo base_url();?>home/tambah" method="post" accept-charset="utf-8">
<div class="kotak2">
<img class="img-responsive"width="300px" height="300px" src="<?php echo base_url() . 'assets/images/'.$dataJ['gambar']; ?>"/>
 <h5>Harga: Rp. <?php echo number_format($dataJ['harga'],0,",",".");?></h5>
 <p class="card-text">
<strong> <u>Deskripsi</u></strong><br>
 <?php echo $dataJ['deskripsi'];?></p>
  <input type="hidden" name="id" value="<?php echo $dataJ['id_produk']; ?>" />
  <input type="hidden" name="nama" value="<?php echo $dataJ['nama_produk']; ?>" />
  <input type="hidden" name="harga" value="<?php echo $dataJ['harga']; ?>" />
  <input type="hidden" name="gambar" value="<?php echo $dataJ['gambar']; ?>" />
  <input type="hidden" name="qty" value="1" />
 <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-shopping-cart"></i> Beli Produk Ini</button>
 </div>
 </form>
 <br>
 <br>
 <br>
 <br>