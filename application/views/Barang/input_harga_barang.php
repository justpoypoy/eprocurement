<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?= site_url('kirim-harga'); ?>" method="POST">
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
                <input type="text" name="jumlah" class="form-control" onkeypress="return isNumberKey(event)" value="<?= $row->jumlah; ?> <?= __nama('tb_satuan', 'id_satuan', $row->id_satuan, 'nm_satuan'); ?>" disabled="disabled"/>
            </div>

            <div class="form-group">
                <label> Harga Barang</label>
                <input type="text" name="harga" class="form-control" onkeypress="return isNumberKey(event)" placeholder="Input harga barang" autofocus="autofocus" required="required"/>
            </div>

            <div class="box-footer">
                <input type="hidden" name="idbarang" value="<?= $row -> id_barang; ?>">
                <input type="hidden" name="nopo" value="<?= $row -> no_po; ?>">
                <input type="hidden" name="idsupplier" value="<?= $this -> session -> userdata('username'); ?>">
                <button type="submit" name="kirim" class="btn btn-success pull-left">Kirim Harga</button>
                <a href="<?= site_url('form-request'); ?>" class="btn btn-danger pull-right">Cancel</a>
            </div>
        </form
    </div>
</div>
