<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?= site_url('tambah-user'); ?>" method="POST">
            <div class="form-group">
                <label> Nama Lengkap <span style=" color: red;">*</span></label>
                <input type="text" name="nama" class="form-control" placeholder="Input nama lengkap" required="required">
            </div>

            <div class="form-group">
                <label> Email <span style=" color: red;">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="Input email" required="required"/>
            </div>

            <div class="form-group">
                <label> Nomor Telepon / Handphone </label>
                <input type="text" name="nohp" class="form-control" placeholder="Input no handphone atau telepon"/>
            </div>

            <div class="form-group">
                <label> Username <span style=" color: red;">*</span></label>
                <input type="text" name="username" id="username" onkeyup="cek_username()" class="form-control" placeholder="Input username" required="required"/>
                <span id="pesan_username"></span>
            </div>

            <div class="form-group">
                <label> Password <span style=" color: red;">**</span></label>
                <input type="password" name="password" class="form-control" placeholder="Input password"/>
            </div>

            <div class="form-group">
                <label> Akses Level <span style=" color: red;">*</span></label>
                <select name="akses" required="required" class="form-control">
                    <option>-- Pilih Akses Level --</option>
                    <option value="1">Administrator</option>
                    <option value="2">Admin Stok</option>
                    <option value="3">Admin Pengadaan</option>
                    <option value="4">Admin Request</option>
                    <option value="5">Admin Purchase Order</option>
                </select>
            </div>

            <div class="form-group">
                <label> Status User <span style=" color: red;">*</span></label>
                <select name="status" required="required" class="form-control">
                    <option>-- Pilih Status User --</option>
                    <option value="1">Aktif</option>
                    <option value="2">Nonaktif</option>
                </select>
            </div>

            <div class="box-footer">
                <span style=" color: red;">* Wajib diisi</span><br>
                <span style=" color: red;">** Jika password kosong maka akan generate password standard (12345)</span><br>
                <span id="bsubmit"></span>
<!--                <button type="submit" name="submit" id="bsubmit" class="btn btn-primary">SIMPAN</button>-->
                <a href="<?= site_url('data-barang') ?>" class="btn btn-danger">BATAL</a>
            </div>
        </form>
    </div>
</div>
