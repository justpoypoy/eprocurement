<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url(); ?>assets/dist/img/e.png">

    <title><?= ucwords($title); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>assets/dist/css/sticky-footer-navbar.css" rel="stylesheet">

  </head>
<?php 
 $uri = $this -> uri -> segment(1); 
 $cek = $this -> session -> userdata('isLogin');
 $lvl = $this -> session -> userdata('akses_level');
    if($uri == ''){ 
        redirect('halaman-utama'); 
    } 
    if($cek != TRUE){
        $this -> session -> set_flashdata('pesan',  '<div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h4><i class="icon fa fa-check"></i> Silahkan login terlebih dahulu. </h4>
                                                    </div>');
        redirect('menu-login');
    }
 ?>

  <body>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?= site_url('halaman-utama'); ?>"><img src="<?= base_url('assets/dist/img/logotrans.png'); ?>"></a>
                </div>
                <?php $uri = $this -> uri -> segment(1); ?>
                <div id="navbar" class="navbar-collapse collapse">
                    <!--ADMIN USER-->
                    <?php if($lvl == 1){ ?>
                    <ul class="nav navbar-nav">
                        <li <?php if($uri == 'halaman-utama'){echo 'class="active"';} ?>><a href="<?= site_url('halaman-utama'); ?>">Home</a></li>
                        <li <?php if($uri == 'data-barang' || $uri == 'tambah-barang' || $uri == 'rubah-barang'){echo 'class="active"';} ?>><a href="<?= site_url('data-barang'); ?>">Barang</a></li>
                        <li <?php if($uri == 'data-gudang' || $uri == 'tambah-gudang' || $uri == 'rubah-gudang'){echo 'class="active"';} ?>><a href="<?= site_url('data-gudang'); ?>">Gudang</a></li>
                        <li <?php if($uri == 'data-supplier' || $uri == 'tambah-supplier' || $uri == 'rubah-supplier'){echo 'class="active"';} ?>><a href="<?= site_url('data-supplier'); ?>">Supplier</a></li>
                        <li <?php if($uri == 'data-user' || $uri == 'tambah-user' || $uri == 'rubah-user'){echo 'class="active"';} ?>><a href="<?= site_url('data-user'); ?>">User Akses</a></li>
                    </ul>
                    <?php } ?>
                    
                    <!--GUDANG USER-->
                    <?php if($lvl == 2){ ?>
                    <ul class="nav navbar-nav">
                        <li <?php if($uri == 'halaman-utama'){echo 'class="active"';} ?>><a href="<?= site_url('halaman-utama'); ?>">Home</a></li>
                        <li <?php if($uri == 'request-barang' || $uri == 'tambah-request-barang'){echo 'class="active"';} ?>><a href="<?= site_url('request-barang'); ?>">Request Barang</a></li>
                    </ul>
                    <?php } ?>
                    
                    <!--PURCHASING USER-->
                    <?php if($lvl == 3){ ?>
                    <ul class="nav navbar-nav">
                        <li <?php if($uri == 'halaman-utama'){echo 'class="active"';} ?>><a href="<?= site_url('halaman-utama'); ?>">Home</a></li>
                        <li <?php if($uri == 'data-barang' || $uri == 'tambah-barang' || $uri == 'rubah-barang'){echo 'class="active"';} ?>><a href="<?= site_url('data-barang'); ?>">Master Barang</a></li>
                        <li <?php if($uri == 'data-gudang' || $uri == 'tambah-gudang' || $uri == 'rubah-gudang'){echo 'class="active"';} ?>><a href="<?= site_url('data-gudang'); ?>">Gudang</a></li>
                        <li <?php if($uri == 'data-request-barang' || $uri == 'detail-request'){echo 'class="active"';} ?>><a href="<?= site_url('data-request-barang'); ?>">Daftar Request Barang</a></li>
                        <li <?php if($uri == 'data-laporan'){echo 'class="active"';} ?>><a href="<?= site_url('data-laporan'); ?>">Laporan</a></li>
                        <!--<li <?php if($uri == 'data-beli-barang'){echo 'class="active"';} ?>><a href="<?= site_url('data-beli-barang'); ?>">Daftar Harga Supplier</a></li>-->
                    </ul>
                    <?php } ?>
                    
                    <!--SPV USER-->
                    <?php if($lvl == 5){ ?>
                    <ul class="nav navbar-nav">
                        <li <?php if($uri == 'halaman-utama'){echo 'class="active"';} ?>><a href="<?= site_url('halaman-utama'); ?>">Home</a></li>
                        <li <?php if($uri == 'data-laporan'){echo 'class="active"';} ?>><a href="<?= site_url('data-laporan'); ?>">Laporan</a></li>
                    </ul>
                    <?php } ?>

                    <!--SUPPLIER USER-->
                    <?php if($lvl == 6){ ?>
                    <ul class="nav navbar-nav">
                        <li <?php if($uri == 'halaman-utama'){echo 'class="active"';} ?>><a href="<?= site_url('halaman-utama'); ?>">Home</a></li>
                        <li <?php if($uri == 'form-request'){echo 'class="active"';} ?>><a href="<?= site_url('form-request'); ?>">Data Request</a></li>
                    </ul>
                    <?php } ?>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= site_url('sign-out'); ?>">Logout&nbsp;<span class="glyphicon glyphicon-log-out"></span></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">

            <?php
            if (!empty($isi)) {
                $this->load->view($isi);
            }
            ?>

        </div> <!-- /container -->

        <footer class="footer">
            <div class="container">
                <p class="text-muted">Place sticky footer content here.</p>
            </div>
        </footer>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?= base_url(); ?>assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="<?= base_url(); ?>assets/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>assets/datatables/media/js/dataTables.bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>assets/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function () {
                    $('#example,#gudang').DataTable();
            });
            function isNumberKey(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57)){
                    return false;
                }else{
                    return true;
                }
            }
            function cek_username(){
                $("#pesan_username").hide();
                $("#bsubmit").hide();
                
                var username = $("#username").val();

                if(username != ""){
                    $.ajax({
                        url: "<?php echo site_url() . 'cek-username'; ?>", 
                        data: 'username='+username,
                        type: "POST",
                        success: function(msg){
                            if(msg == 1){
                                $("#pesan_username").css("color","#fc5d32");
                                $("#username").css("border-color","#fc5d32");
                                $("#pesan_username").html("Maaf username sudah digunakan.");
                                $("#bsubmit").html('');
                                error = 1;
                            }else{
                                $("#pesan_username").css("color","#59c113");
                                $("#username").css("border-color","#59c113");
                                $("#pesan_username").html("Username anda bisa digunakan");
                                $("#bsubmit").html('<button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>');
                                error = 0;
                            }
                            $("#pesan_username").fadeIn(1000);
                            $("#bsubmit").fadeIn(1000);
                        }
                    });
                }       

            }
        </script>
    </body>
</html>
