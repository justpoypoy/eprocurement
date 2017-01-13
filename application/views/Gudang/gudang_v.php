<div class="panel panel-default">
    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="btn-group">
                    <a href="<?= site_url('tambah-gudang'); ?>" type="button" class="btn btn-default" title="Tambah Data Gudang"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;TAMBAH GUDANG</a>
                </div>
                <hr>
                <?php echo $this -> session -> flashdata('pesan'); ?>
                <?php if (!empty($gudang)) { ?>
                    <table id="gudang" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA GUDANG</th>
                                <th>OPTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($gudang as $g) {
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= strtoupper($g -> nm_gudang); ?></td>
                                    <td>
                                        <a href="<?= site_url('rubah-gudang'); ?>/<?= $g -> id_gudang; ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-pencil"></i>&nbsp;RUBAH DATA</a>
                                        <a href="<?= site_url('hapus-gudang'); ?>/<?= $g -> id_gudang; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;HAPUS DATA</a>
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
                                <th>NAMA GUDANG</th>
                                <th>OPTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">Maaf data gudang belum tersedia ...</td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>

    </div>
</div>
