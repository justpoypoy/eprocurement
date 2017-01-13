<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?= site_url('rubah-supplier/'.$this -> uri -> segment(2)); ?>" method="POST">
            <div class="form-group">
                <label> Nama Supplier <span style=" color: red;">*</span></label>
                <input type="text" name="nama" class="form-control" value="<?= $row -> nm_supplier; ?>" required="required">
            </div>
            
            <div class="form-group">
                <label> No Hp Supplier <span style=" color: red;">*</span></label>
                <input type="text" name="nohp" class="form-control" value="<?= $row -> no_hp; ?>" required="required">
            </div>
            
            <div class="form-group">
                <label> Keterangan <span style=" color: red;">*</span></label>
                <input type="text" name="keterangan" class="form-control" value="<?= $row -> keterangan ?>" required="required">
            </div>

            <div class="box-footer">
                <span style=" color: red;">* Wajib diisi</span><br>
                <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                <a href="<?= site_url('data-user') ?>" class="btn btn-danger">BATAL</a>
            </div>
        </form>
    </div>
</div>
