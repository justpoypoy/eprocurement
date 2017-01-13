<div class="panel panel-default">
    <div class="panel-body">
        <div class="btn-group">
            <a href="<?= site_url('tambah-barang'); ?>" type="button" class="btn btn-default" title="Tambah Data Barang"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;TAMBAH MASTER BARANG</a>
        </div>
        <hr>
        <?= $this -> session -> flashdata('pesan'); ?>
        <?php if (!empty($barang)) { ?>
            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA BARANG</th>
                        <th>HARGA BARANG</th>
                        <th>STOK BARANG</th>
                        <th>GUDANG</th>
                        <th>SUPPLIER</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($barang as $b) {?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $b -> nm_barang; ?></td>
                        <td><?= __rupiah($b -> harga); ?></td>
                        <td><?= $b -> stok; ?></td>
                        <td><?= strtoupper(__nama('tb_gudang', 'id_gudang', $b -> id_gudang, 'nm_gudang')); ?></td>
                        <td><?= strtoupper(__nama('tb_users', 'id', $b -> id_supplier, 'nama')); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA BARANG</th>
                        <th>HARGA BARANG</th>
                        <th>STOK BARANG</th>
                        <th>GUDANG</th>
                        <th>SUPPLIER</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6">Maaf data barang belum tersedia ...</td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
