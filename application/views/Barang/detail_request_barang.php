<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label> Nomor PO</label>
            <input type="text" name="jumlah" class="form-control" onkeypress="return isNumberKey(event)" value="<?= $row->no_po; ?>" disabled="disabled"/>
        </div>

        <div class="form-group">
            <label> Nama Barang</label>
            <input type="text" name="namabarang" class="form-control" value="<?= __nama('tb_barang', 'id_barang', $row->id_barang, 'nm_barang'); ?>" disabled="disabled">
        </div>

        <div class="form-group">
            <label> Jumlah Barang</label>
            <input type="text" name="jumlah" class="form-control" onkeypress="return isNumberKey(event)" value="<?= $row->jumlah; ?> <?= __nama('tb_satuan', 'id_satuan', $row -> id_satuan, 'nm_satuan'); ?>" disabled="disabled"/>
        </div>

        <div class="box-footer">
            <a href="<?= site_url('approve-request/' . $row->id_permintaan); ?>" onclick="return confirm('Anda yakin approve request ini?')" class="btn btn-success pull-left">Approve</a>&nbsp; &nbsp;
            <a href="<?= site_url('reject-request/' . $row->id_permintaan); ?>" onclick="return confirm('Anda yakin reject request ini?')"class="btn btn-danger pull-right">Reject</a>
            <hr>
            <a href="<?= site_url('data-request-barang') ?>" class="btn btn-default pull-left">Back To Request</a>
        </div>
    </div>
</div>
