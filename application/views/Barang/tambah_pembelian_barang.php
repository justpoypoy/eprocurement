<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?= site_url('tambah-beli-barang/'.$row -> id_barang.'/'.$row -> id_permintaan); ?>" method="POST">
            <div class="form-group">
                <label> Nama Barang</label>
                <input type="text" class="form-control" value="<?= __nama('tb_barang', 'id_barang', $row -> id_barang, 'nm_barang'); ?>" disabled="disabled">
            </div>

            <div class="form-group">
                <label> Jumlah Request Barang</label>
                <input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="<?= $row -> jumlah; ?> <?= __nama('tb_satuan', 'id_satuan', $row -> id_satuan, 'nm_satuan'); ?>" disabled="disabled"/>
            </div>
            
            <div class="form-group">
                <label> Nama Supplier <span style=" color: red;">*</span></label>
                <select name="supplier" class="form-control" required="required">
                    <option>-- Pilih Supplier --</option>
                    <?php
                    foreach ($supplier as $s) {
                        echo '<option value="' . $s->id_supplier . '">' . $s->nm_supplier . '</option>';
                    }
                    ?>
                </select>
            </div>
            
            <div class="box-footer">
                <span style=" color: red;">* Wajib diisi</span><br>
                <hr>
                <input type="hidden" name="stok" value="<?= $row -> jumlah; ?>"/>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                <a href="<?= site_url('data-beli-barang') ?>" class="btn btn-danger pull-right">Back To List</a>
            </div>
        </form>
    </div>
</div>
