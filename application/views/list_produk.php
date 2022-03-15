<div style="border:1px solid black;float:left;width:300px; position: relative;top: 50px;">
           <a href="<?php echo base_url()?>home/tampil_cart" class="list-group-item"><strong><i class="glyphicon glyphicon-shopping-cart"></i> KERANJANG BELANJA</strong></a>
          <?php 
      
        $cart= $this->cart->contents();

      if(empty($cart)) {
        ?>
                <a class="list-group-item">Keranjang Belanja Kosong</a>
                <?php
      }
      else
        {
          $grand_total = 0;
          foreach ($cart as $item)
            {
              $grand_total+=$item['subtotal'];
        ?>
                <a class="list-group-item"><?php echo $item['name']; ?> (<?php echo $item['qty']; ?> x <?php echo number_format($item['price'],0,",","."); ?>)=<?php echo number_format($item['subtotal'],0,",","."); ?></a>
                <?php 
            }
        ?>

                <?php   
        }
 ?>
      </div>
<div style="float:right; width: 800px;">
<h2>Daftar Produk</h2>
<?php
	foreach ($data as $row) {
?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="kotak">
              <form method="post" action="<?php echo base_url();?>home/tambah" method="post" accept-charset="utf-8">
                <a href="#"><img style="width:300px;height: 300px;"class="img-thumbnail" src="<?php echo base_url() . 'assets/images/'.$row['gambar']; ?>"/></a>
                <div class="card-body"> 
                  <h4 class="card-title">
                    <a href="#"><?php echo $row['nama_produk'];?></a>
                  </h4>
                  <h5>Rp. <?php echo number_format($row['harga'],0,",",".");?></h5>
                  <p class="card-text"><?php echo $row['deskripsi'];?></p>
                </div>
                <div class="card-footer">
                  <a href="<?php echo base_url();?>home/detail_produk/<?php echo $row['id_produk'];?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search"></i> Detail</a> 
                  
                  <input type="hidden" name="id" value="<?php echo $row['id_produk']; ?>" />
                  <input type="hidden" name="nama" value="<?php echo $row['nama_produk']; ?>" />
                  <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>" />
                  <input type="hidden" name="gambar" value="<?php echo $row['gambar']; ?>" />
                  <input type="hidden" name="qty" value="1" />
                  <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
                </div>
                </form>
              </div>
            </div>
<?php
	}
?>
</div>
