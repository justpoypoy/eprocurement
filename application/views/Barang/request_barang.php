<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        <?php if (!empty($barang)) { ?>
            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO PO</th>
                        <th>USER REQUEST</th>
                        <th>NAMA BARANG</th>
                        <th>TANGGAL REQUEST</th>
                        <th width="10%">JUMLAH BARANG</th>
                        <th>GUDANG</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($barang as $b) {?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $b -> no_po; ?></td>
                        <td><?= __nama('tb_users', 'id', $b -> id_user_request, 'username'); ?></td>
                        <td><?= __nama('tb_barang', 'id_barang', $b -> id_barang, 'nm_barang'); ?></td>
                        <td><?= $b -> tanggal_req; ?></td>
                        <td><?= $b -> jumlah; ?> <?= __nama('tb_satuan', 'id_satuan', $b -> id_satuan, 'nm_satuan'); ?></td>
                        <td><?= __nama('tb_gudang', 'id_gudang', $b -> id_gudang, 'nm_gudang'); ?></td>
                        <td><?php if($b -> status_req == 1){ ?>
                            <!--<a href="<? = site_url('detail-request/'.$b -> id_barang); ?>" class="btn btn-info btn-sm">Detail</a>-->
                            <a href="<?= site_url('send-request/'.$b -> no_po); ?>" onclick="return confirm('Anda ingin membroadcast permintaan ini ke supplier?')" class="btn btn-primary btn-sm">Info Ke Supplier</a>
                        <?php }elseif($b -> status_req == 6){ ?>
                            <span class="label label-info">Menunggu harga dari supplier</span>
                        <?php }elseif($b -> status_req == 3){ ?>
                            <a href="<?= site_url('data-beli-barang/'.$b -> no_po); ?>" class="btn btn-primary btn-sm">Lihat harga supplier</a>
                        <?php }else{ 
                            echo '<span class="label label-success" title="Pembelian Berhasil">Pembelian Berhasil</label>'; 
                        }?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO PO</th>
                        <th>USER REQUEST</th>
                        <th>NAMA BARANG</th>
                        <th>TANGGAL REQUEST</th>
                        <th width="10%">JUMLAH BARANG</th>
                        <th>GUDANG</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="8">Maaf data request belum tersedia ...</td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
