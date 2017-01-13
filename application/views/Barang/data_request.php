<div class="panel panel-default">
    <div class="panel-body">
        <div class="btn-group">
            <a href="<?= site_url('tambah-request-barang'); ?>" type="button" class="btn btn-default" title="Request Barang"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;REQUEST BARANG</a>
        </div>
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
                        <th>STATUS REQUEST</th>
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
                        <td><?= __status_barang($b -> status_req,$b -> id_barang); ?></td>
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
                        <th>STATUS REQUEST</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="8">Maaf data barang belum tersedia ...</td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
