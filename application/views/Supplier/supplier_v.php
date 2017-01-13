<div class="panel panel-default">
    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="btn-group">
                    <a href="<?= site_url('tambah-supplier'); ?>" type="button" class="btn btn-default" title="Tambah Data Supplier"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;TAMBAH SUPPLIER</a>
                </div>
                <hr>
                <?php echo $this -> session -> flashdata('pesan'); ?>
                <?php if (!empty($supplier)) { ?>
                    <table id="gudang" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA SUPPLIER</th>
                                <th>NO HP SUPPLIER</th>
                                <th>KETERANGAN</th>
                                <th>OPTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($supplier as $s) {
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= strtoupper($s -> nm_supplier); ?></td>
                                    <td><?= $s -> no_hp; ?></td>
                                    <td><?= strtoupper($s -> keterangan); ?></td>
                                    <td>
                                        <a href="<?= site_url('rubah-supplier'); ?>/<?= $s -> id_supplier; ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-pencil"></i>&nbsp;RUBAH DATA</a>
                                        <a href="<?= site_url('hapus-supplier'); ?>/<?= $s -> id_supplier; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;HAPUS DATA</a>
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
                                <th>NAMA SUPPLIER</th>
                                <th>NO HP SUPPLIER</th>
                                <th>KETERANGAN</th>
                                <th>OPTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">Maaf data supplier belum tersedia ...</td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>

    </div>
</div>
