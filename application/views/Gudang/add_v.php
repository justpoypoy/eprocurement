<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?= site_url('tambah-gudang'); ?>" method="POST">
            <div class="form-group">
                <label> Nama Gudang <span style=" color: red;">*</span></label>
                <input type="text" name="nama" class="form-control" placeholder="Input nama gudang" required="required">
            </div>

            <div class="box-footer">
                <span style=" color: red;">* Wajib diisi</span><br>
                <button type="submit" name="submit" id="bsubmit" class="btn btn-primary">SIMPAN</button>
                <a href="<?= site_url('data-gudang') ?>" class="btn btn-danger">BATAL</a>
            </div>
        </form>
    </div>
</div>
