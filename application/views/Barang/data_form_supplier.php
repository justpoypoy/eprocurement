<div class="panel panel-default">
    <div class="panel-body">
        <?php if (!empty($barang)) { ?>
            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO PO</th>
                        <th>NAMA BARANG</th>
                        <th>TANGGAL REQUEST</th>
                        <th width="10%">JUMLAH BARANG</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($barang as $b) {?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $b -> no_po; ?></td>
                        <td><?= __nama('tb_barang', 'id_barang', $b -> id_barang, 'nm_barang'); ?></td>
                        <td><?= $b -> tanggal_req; ?></td>
                        <td><?= $b -> jumlah; ?> <?= __nama('tb_satuan', 'id_satuan', $b -> id_satuan, 'nm_satuan'); ?></td>
                        <td>
                            <a href="<?= site_url('form-input-harga/'.$b -> no_po); ?>" class="btn btn-sm btn-primary">Input Harga</a>
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
                        <th>NAMA BARANG</th>
                        <th>TANGGAL REQUEST</th>
                        <th width="10%">JUMLAH BARANG</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6">Maaf data request barang belum tersedia ...</td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
