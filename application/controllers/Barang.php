<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this -> load -> model(array('M_barang','M_gudang','M_supplier'));
    }

    public function index() {
        $this -> data['title']  = 'Data Barang - E-Procurement';
        $this -> data['barang'] = $this -> M_barang -> getDataBarang();
        $this -> data['isi']    = 'Barang/barang_v';
        $this -> load -> view('Layout/tema', $this -> data);
    }
    public function addBarang() {
        if(isset($_POST['submit'])){
            $this -> M_barang -> tambah();
            $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h4><i class="icon fa fa-check"></i> Tambah barang berhasil</h4>
                                                        </div>');
            redirect('data-barang');
        }else{
            $this -> data['title']  = 'Tambah Data Barang - E-Procurement';
            $this -> data['isi']    = 'Barang/add_v';
            $this -> load -> view('Layout/tema', $this -> data);
        }
    }
    public function requestBarang(){
        $this -> data['title']  = 'Request Barang - E-Procurement';
        $this -> data['barang'] = $this -> M_barang -> DataRequestBarang();
        $this -> data['isi']    = 'Barang/data_request';
        $this -> load -> view('Layout/tema', $this -> data);
    }
    public function tambahRequestBarang(){
        if(isset($_POST['submit'])){
            $this -> M_barang -> tambahRequest();
            $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h4><i class="icon fa fa-check"></i> Request barang berhasil</h4>
                                                        </div>');
            redirect('request-barang');
        }else{
            $this -> data['title']  = 'Request Barang - E-Procurement';
            $this -> data['barang'] = $this -> M_barang -> getDataBarang();
            $this -> data['gudang'] = $this -> M_gudang -> getData();
            $this -> data['satuan'] = $this -> M_barang -> getDataSatuan();
            $this -> data['isi']    = 'Barang/tambah_request_barang';
            $this -> load -> view('Layout/tema', $this -> data);
        }
    }
    public function sendRequest(){
            $sendid = $this -> uri -> segment(2);
            $data = array('status_req' => 6);            
            $this -> db -> where('no_po', $sendid);
            $this -> db -> update('tb_request',$data);
            $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h4><i class="icon fa fa-check"></i> Request barang berhasil dikirim ke supplier</h4>
                                                        </div>');
            redirect('data-request-barang');
    }
    public function dataForSupplier(){
        $this -> data['title']  = 'Data Request Barang - E-Procurement';
        $this -> data['barang'] = $this -> M_barang -> DaftarForSupplier();
        $this -> data['isi']    = 'Barang/data_form_supplier';
        $this -> load -> view('Layout/tema', $this -> data);
    }
    public function inputHargaSupplier(){
        if(isset($_POST['kirim'])){
            $po = $this->input->post('nopo');
            $this -> M_barang -> tambahHarga();
            $data = array('status_req' => 3);
            $this -> db -> where('no_po',$po);
            $this -> db -> update('tb_request',$data);
            $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h4><i class="icon fa fa-check"></i> Input harga barang untuk '.$po.' berhasil</h4>
                                                        </div>');
            redirect('form-request');
        }else{
            $id = $this -> uri -> segment(2);
            $ids = $this -> session -> userdata('username');
            $idsu = __nama('tb_users', 'username', $ids, 'id');
            $this -> data['title']  = 'Request Barang - E-Procurement';
            $this -> data['row']    = $this -> M_barang -> formDetailRequest($id);
            $this -> data['cek']    = $this -> M_barang -> formHasilRequest($id);
            $this -> data['isi']    = 'Barang/input_harga_barang';
            $this -> load -> view('Layout/tema', $this -> data);
        }
    }
    public function dataLaporan(){
        $this -> data['title']  = 'Data Laporan Request Barang - E-Procurement';
        $this -> data['barang'] = $this -> M_barang -> dataLaporan();
        $this -> data['isi']    = 'Barang/laporan_request_barang';
        $this -> load -> view('Layout/tema', $this -> data);
    }
    public function cetakLaporan(){
        $po = $this -> uri -> segment(2);
        $this -> data['title']  = 'Cetak Laporan Request Barang - E-Procurement';
        $this -> data['barang'] = $this -> M_barang -> cetakLaporan($po);
        $this -> data['isi']    = 'Barang/cetak_laporan_request_barang';
        $this -> load -> view('Layout/tema', $this -> data);
    }
    
    
    
    public function dataRequest(){
        $this -> data['title']  = 'Data Request Barang - E-Procurement';
        $this -> data['barang'] = $this -> M_barang -> DaftarRequestBarang();
        $this -> data['isi']    = 'Barang/request_barang';
        $this -> load -> view('Layout/tema', $this -> data);
    }
    public function detailRequest(){
        $id = $this -> uri -> segment(2);
        $this -> data['title']  = 'Data Request Barang - E-Procurement';
        $this -> data['row'] = $this -> M_barang -> detailRequest($id);
        $this -> data['isi']    = 'Barang/detail_request_barang';
        $this -> load -> view('Layout/tema', $this -> data);
    }
    public function approveRequest(){
        $id = $this -> uri -> segment(2);
        $this -> M_barang -> approveRequest($id);
        $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h4><i class="icon fa fa-check"></i> Barang telah diapprove.</h4>
                                                    </div>');
        redirect('data-request-barang');
    }
    public function rejectRequest(){
        $id = $this -> uri -> segment(2);
        $this -> M_barang -> rejectRequest($id);
        $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h4><i class="icon fa fa-check"></i> Barang telah direject.</h4>
                                                    </div>');
        redirect('data-request-barang');
    }
    public function dataBeli(){
        $nopo = $this -> uri -> segment(2);
        $this -> data['title']  = 'Data Pembelian Barang - E-Procurement';
        $this -> data['barang'] = $this -> M_barang -> datadarisupplier($nopo);
        $this -> data['isi']    = 'Barang/pembelian_barang';
        $this -> load -> view('Layout/tema', $this -> data);
    }
    public function approveBeli(){
        if(isset($_POST['submit'])){
//            echo "<pre>";
//            print_r($_POST);
//            echo "</pre>";
//            die;
            $cek    = $this -> input -> post('cek');
            $ids    = __nama('tb_form_supplier', 'id', $cek[0], 'id_supplier');
            $idst   = __nama('tb_form_supplier', 'id', $cek[0], 'id_satuan');
            $harga  = __nama('tb_form_supplier', 'id', $cek[0], 'harga');
            $stok   = __nama('tb_form_supplier', 'id', $cek[0], 'jumlah');
            $idg    = __nama('tb_form_supplier', 'id', $cek[0], 'id_gudang');
            $po    = __nama('tb_form_supplier', 'id', $cek[0], 'no_po');
            $idb    = __nama('tb_form_supplier', 'id', $cek[0], 'id_barang');
            
            $data = array('harga' => $harga,'id_satuan' => $idst, 'id_gudang' => $idg, 'stok' => $stok, 'id_supplier' => $ids);
            $this -> db -> where('id_barang',$idb);
            $this -> db -> update('tb_barang',$data);
            
            $dataa = array('status_req' => 4);
            $this -> db -> where('no_po',$po);
            $this -> db -> update('tb_request',$dataa);
            redirect('data-request-barang');
            
        }else{
            redirect('data-request-barang');
        }
    }
     public function pembelianRequest(){
         $id = $this -> uri -> segment(2);
         $id_p = $this -> uri -> segment(3);
        if(isset($_POST['submit'])){
            $this -> M_barang -> tambahBeli($id);
            $this -> M_barang -> updateBeli($id_p);
                $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h4><i class="icon fa fa-check"></i> Pembelian barang berhasil</h4>
                                                        </div>');
                redirect('data-beli-barang');
        }else{
            $this -> data['title']  = 'Tambah Data Pembelian Request - E-Procurement';
            $this -> data['row'] = $this -> M_barang -> detailRequest($id);
            $this -> data['supplier'] = $this -> M_supplier -> getData();
            $this -> data['isi']    = 'Barang/tambah_pembelian_barang';
            $this -> load -> view('Layout/tema', $this -> data);
        }
    }

}
