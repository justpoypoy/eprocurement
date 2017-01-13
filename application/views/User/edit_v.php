<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?= site_url('rubah-user'); ?>" method="POST">
            <div class="form-group">
                <label> Nama Lengkap <span style=" color: red;">*</span></label>
                <input type="text" name="nama" class="form-control" value="<?= $row -> nama; ?>" required="required">
            </div>

            <div class="form-group">
                <label> Email <span style=" color: red;">*</span></label>
                <input type="email" name="email" class="form-control" value="<?= $row -> email; ?>" required="required"/>
            </div>

            <div class="form-group">
                <label> Nomor Telepon / Handphone </label>
                <input type="text" name="nohp" class="form-control" value="<?= $row -> no_hp; ?>"/>
            </div>

            <div class="form-group">
                <label> Username <span style=" color: red;">*</span></label>
                <input type="text" class="form-control" value="<?= $row -> username; ?>" disabled="disabled"/>
                <input type="hidden" name="username" value="<?= $row -> username; ?>"/>
            </div>

            <div class="form-group">
                <label> Akses Level <span style=" color: red;">*</span></label>
                <select name="akses" required="required" class="form-control">
                    <option>-- Pilih Akses Level --</option> 
                    <option value="1" <?php if($row -> akses_level == 1){ echo 'selected="selected"';} ?>>Administrator</option>
                    <option value="2" <?php if($row -> akses_level == 2){ echo 'selected="selected"';} ?>>Admin Stok</option>
                    <option value="3" <?php if($row -> akses_level == 3){ echo 'selected="selected"';} ?>>Admin Pengadaan</option>
                    <option value="4" <?php if($row -> akses_level == 4){ echo 'selected="selected"';} ?>>Admin Request</option>
                    <option value="5" <?php if($row -> akses_level == 5){ echo 'selected="selected"';} ?>>Admin Purchase Order</option>
                </select>
            </div>

            <div class="form-group">
                <label> Status User <span style=" color: red;">*</span></label>
                <select name="status" required="required" class="form-control">
                    <option>-- Pilih Status User --</option>
                    <option value="1" <?php if($row -> status == 1){ echo 'selected="selected"';} ?>>Aktif</option>
                    <option value="2" <?php if($row -> status == 2){ echo 'selected="selected"';} ?>>Nonaktif</option>
                </select>
            </div>

            <div class="box-footer">
                <span style=" color: red;">* Wajib diisi</span><br>
                <span style=" color: red;">** Jika password kosong maka akan generate password standard (12345)</span><br>
                <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                <a href="<?= site_url('data-user') ?>" class="btn btn-danger">BATAL</a>
                <a href="<?= site_url('data-user') ?>" class="pull-right btn btn-success">CHANGE PASSWORD</a>
            </div>
        </form>
    </div>
</div>
