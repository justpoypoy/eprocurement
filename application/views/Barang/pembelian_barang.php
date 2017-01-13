<div class="panel panel-default">
    <div class="panel-body">
        <div class="btn-group">
            <a href="<?= site_url('data-request-barang'); ?>" type="button" class="btn btn-default" title="Back To Daftar Request Barang"><i class="glyphicon glyphicon-backward"></i>&nbsp;Kembali</a>
        </div>
        <hr>
        <?php if (!empty($barang)) { ?>
        <form action="<?= site_url('approve-beli'); ?>" method="POST">
            <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO PO</th>
                        <th>USER REQUEST</th>
                        <th>NAMA BARANG</th>
                        <th>TANGGAL REQUEST</th>
                        <th>JUMLAH BARANG</th>
                        <th>HARGA</th>
                        <th>SUPPLIER</th>
                        <th>OPTION</th>
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
                        <td><?= __rupiah($b -> harga); ?></td>
                        <td><?= __nama('tb_users', 'id', $b -> id_supplier, 'nama'); ?></td>
                        <td>
                            <input type="radio" name="cek[]" value="<?= $b -> id; ?>">
                        </td>
                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
            
            <button class="btn btn-success" name="submit" type="submit">Beli</button>
        </form>
        <?php } else { ?>
            <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO PO</th>
                        <th>USER REQUEST</th>
                        <th>NAMA BARANG</th>
                        <th>TANGGAL REQUEST</th>
                        <th>JUMLAH BARANG</th>
                        <th>OPTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7">Maaf data barang belum tersedia ...</td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
