<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Sample Invoice</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
      @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
      body, h1, h2, h3, h4, h5, h6{
      font-family: 'Bree Serif', serif;
      }
    </style>
  </head>
  
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <h1>
                <img src="<?= base_url('assets/dist/img/logotrans.png'); ?>">
          </h1>
        </div>
        <div class="col-xs-6 text-right">
          <h1>Purchase Order</h1>
          <h1><small><?= $barang -> no_po; ?></small></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-5">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>From: Sb Energi</h4>
            </div>
            <div class="panel-body">
              <p>
                Kantor Pusat
              </p>
            </div>
          </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 text-right">
          <div class="panel panel-default">
            <div class="panel-heading">
                <h4>To : <?= ucwords(__nama('tb_supplier', 'id_supplier', $barang -> id_supplier, 'nm_supplier')); ?></h4>
            </div>
            <div class="panel-body">
              <p>
                <?= ucwords(__nama('tb_supplier', 'id_supplier', $barang -> id_supplier, 'alamat')); ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- / end client details section -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>
              <h4>Nama Barang</h4>
            </th>
            <th>
              <h4>Jumlah Request</h4>
            </th>
            <th>
              <h4>Harga</h4>
            </th>
            <th>
              <h4>Sub Total</h4>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td><?= __nama('tb_barang', 'id_barang', $barang -> id_barang, 'nm_barang'); ?></td>
              <td><?php echo $barang -> jumlah.'&nbsp;'.__nama('tb_satuan', 'id_satuan', $barang -> id_satuan, 'nm_satuan'); ?></td>
              <td>
                <?php $rp = __nama('tb_barang', 'id_barang', $barang -> id_barang, 'harga'); ?>
                <?= __rupiah($rp); ?>
              </td>
              <td>
                  <?php $total = $barang -> jumlah * $rp; 
                  echo __rupiah($total);
                  ?>
              </td>
          </tr>
        </tbody>
      </table>
      <div class="row text-right">
        <div class="col-xs-2 col-xs-offset-8">
          <p>
            <strong>
            Sub Total : <br>
            TAX : <br>
            Total : <br>
            </strong>
          </p>
        </div>
        <div class="col-xs-2">
          <strong>
          <?= __rupiah($total); ?> <br>
          10 % <br>
          <?php $totala = $total * 10/100; $totalb = $totala + $total;?>
          <?= __rupiah($totalb); ?> <br>
          </strong>
        </div>
      </div>
    </div>
  </body>
</html>