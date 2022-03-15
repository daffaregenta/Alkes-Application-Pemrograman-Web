    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">alkeskuy</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
           <li><a href="<?php echo base_url('home/indeks'); ?>">Beranda</a></li>
                <li><a href="<?php echo base_url()?>home/tentang"><i class="glyphicon glyphicon-info-sign"></i> Tentang</a></li>
                <li><a href="<?php echo base_url('home/tampil_cart'); ?>"><i class="glyphicon glyphicon-shopping-cart"></i> Keranjang Belanja</a></li>
                  <?php
            if($this->session->userdata('role') == 'Admin'){ 
                ?>
                <li><a href="<?php echo base_url('home/produk'); ?>"><b>Kelola Produk</b></a></li>
                <?php
            }
            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown pull-right">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Halo, <?php echo $this->session->userdata('nama') ?>
        <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><b>Kamu adalah <?php echo $this->session->userdata('role') ?></b></a></li> 
                    <li><a href="<?php echo base_url('home/logout') ?>">Keluar</a></li>
                </ul>
            </li>
        </ul>
    </div>