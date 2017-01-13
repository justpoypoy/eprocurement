<?php

if (!defined('BASEPATH'))
    exit('does not helper name');
if (!function_exists('__nama')) {

    function __nama($tb, $primary, $parameter, $field) {
        $selectArg = mysqli_connect("localhost", "root", "", "db_procrument");
        $selectDB = mysqli_query($selectArg, "select * from `" . $tb . "` where `" . $primary . "`='$parameter'");
        while ($row = mysqli_fetch_array($selectDB, MYSQLI_ASSOC)) {
            $row[$field];
            return $row[$field];
        }
    }

}
if (!function_exists('__tgl')) {
    function __tgl($sekarang) {
        $tanggal = substr($sekarang, 8, 2) + 0;
        $bulan = substr($sekarang, 5, 2);
        $tahun = substr($sekarang, 0, 4);

        $judul_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $wk = $tanggal . " " . $judul_bln[(int) $bulan] . " " . $tahun;
        return $wk;
    }
}

    if (! function_exists('__get_month')){
    function __get_month($id) {
        $id = (int) $id;
        $month = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        return $month[($id - 1)];
    }
}

if (! function_exists('__get_semester')){
    function __get_semester($id) {
        $id = (int) $id;
        $semester = array('Semester I', 'Semester II');
        return $semester[($id - 1)];
    }
}

if (! function_exists('__rupiah')){
function __rupiah($nilaiUang){
	  $nilaiRupiah 	   = "";
	  $jumlahAngka  = strlen($nilaiUang);
	  while($jumlahAngka > 3)
	  {
		$nilaiRupiah    = "." . substr($nilaiUang,-3) . $nilaiRupiah;
		$sisaNilai      = strlen($nilaiUang) - 3;
		$nilaiUang      = substr($nilaiUang,0,$sisaNilai);
		$jumlahAngka    = strlen($nilaiUang);
	  }
	 
	  $nilaiRupiah       = "Rp. " . $nilaiUang. $nilaiRupiah . ",-";
	  return $nilaiRupiah;
		}
}
function __flag($flag){
    if($flag == 1){
        $hasil = '<span class="label label-info" title="Administrator">Administrator</label>';
    }elseif($flag == 2){
        $hasil = '<span class="label label-info" title="Admin Stock">Admin Gudang</label>';
    }elseif($flag == 3){
        $hasil = '<span class="label label-info" title="Admin Pengadaan">Admin Pengadaan</label>';
    }elseif($flag == 4){
        $hasil = '<span class="label label-info" title="Admin Quotation">Admin Quotation</label>';
    }elseif($flag == 5){
        $hasil = '<span class="label label-info" title="Admin Purchase">Admin Purchase</label>';
    }else{
        $hasil = '<span class="label label-danger">BELUM ADA STATUS</label>';
    }
    return $hasil;
}
function __status_barang($flag,$val = NULL){
    if($flag == 1){
        $hasil = '<span class="label label-info" title="Menunggu Persetujuan">Menunggu Persetujuan</label>';
    }elseif($flag == 2){
        $hasil = '<span class="label label-danger" title="Request Ditolak">Request Ditolak</label>';    
    }elseif($flag == 3){
        $hasil = '<span class="label label-success" title="Request Disetujui / Request Proses Pembelian">Request Disetujui / Request Proses Pembelian</label>';
    }elseif($flag == 6){
        $hasil = '<span class="label label-success" title="Request Proses Pembelian">Request Proses Pembelian</label>';
    }elseif($flag == 4){
        //$hasil = '<a href="data-pembelian/'.$val.'" class="btn btn-info">Lihat barang</a>';
        $hasil = '<span class="label label-success" title="Proses Pembelian Berhasil">Proses Pembelian Berhasil</label>';
    }else{
        $hasil = '<span class="label label-danger">BELUM ADA STATUS</label>';
    }
    return $hasil;
}

function acakID() { 
	$coba = md5(sha1(uniqid(rand(),true))); 
	$acakin = substr($coba,0,10);
	return $acakin;
} 
?>
