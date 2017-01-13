<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?= site_url('tambah-request-barang'); ?>" method="POST">
            <div class="form-group">
                <label> Nama Barang <span style=" color: red;">*</span></label>
                <select name="barang" class="form-control" required="required">
                    <option>-- Pilih Barang --</option>
                    <?php
                    foreach ($barang as $b) {
                        echo '<option value="' . $b->id_barang . '">' . ucwords($b->nm_barang) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label> Nama Gudang <span style=" color: red;">*</span></label>
                <select name="gudang" class="form-control" required="required">
                    <option>-- Pilih Gudang --</option>
                    <?php
                    foreach ($gudang as $g) {
                        echo '<option value="' . $g->id_gudang . '">' . ucwords($g->nm_gudang) . '</option>';
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label> Jumlah Pembelian Barang <span style=" color: red;">**</span></label>
                <input type="text" name="stok" class="form-control" onkeypress="return isNumberKey(event)" placeholder="Jumlah Pembelian Barang"/>
            </div>
            
            <div class="form-group">
                <label> Satuan <span style=" color: red;">*</span></label>
                <select name="satuan" class="form-control" required="required">
                    <option>-- Pilih Satuan --</option>
                    <?php
                    foreach ($satuan as $s) {
                        echo '<option value="' . $s->id_satuan . '">' . ucwords($s->nm_satuan) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="box-footer">
                <span style=" color: red;">* Wajib diisi</span><br>
                <span style=" color: red;">** Masukkan hanya angka saja</span><br>
                <hr>
                <input type="hidden" name="iduser" value="<?= $this -> session -> userdata('id') ?>">
                <input type="hidden" name="tgl" value="<?= date('Y-m-d H:i:s'); ?>">
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                <a href="<?= site_url('data-beli-barang') ?>" class="btn btn-danger pull-right">Back To List</a>
            </div>
        </form>
    </div>
</div>
