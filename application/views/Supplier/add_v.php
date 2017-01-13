<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?= site_url('tambah-supplier'); ?>" method="POST">
            <div class="form-group">
                <label> Nama Supplier <span style=" color: red;">*</span></label>
                <input type="text" name="nama" class="form-control" placeholder="Input nama supplier" required="required">
            </div>
            
            <div class="form-group">
                <label> No Hp Supplier <span style=" color: red;">*</span></label>
                <input type="text" name="nohp" class="form-control" placeholder="Input no hp supplier" required="required">
            </div>
            
            <div class="form-group">
                <label> Keterangan <span style=" color: red;">*</span></label>
                <input type="text" name="keterangan" class="form-control" placeholder="Input keterangan supplier" required="required">
            </div>

            <div class="box-footer">
                <span style=" color: red;">* Wajib diisi</span><br>
                <button type="submit" name="submit" id="bsubmit" class="btn btn-primary">SIMPAN</button>
                <a href="<?= site_url('data-supplier') ?>" class="btn btn-danger">BATAL</a>
            </div>
        </form>
    </div>
</div>
