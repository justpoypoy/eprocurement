<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?= site_url('tambah-barang'); ?>" method="POST">
            <div class="form-group">
                <label> Nama Barang <span style=" color: red;">*</span></label>
                <input type="text" name="namabarang" class="form-control" placeholder="Nama Barang">
            </div>

            <div class="box-footer">
                <span style=" color: red;">* Wajib diisi</span><br>
                <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                <a href="<?= site_url('data-barang') ?>" class="btn btn-danger">BATAL</a>
            </div>
        </form>
    </div>
</div>
