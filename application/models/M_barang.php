<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

    public function getDataSatuan() {
        $this -> db -> select('id_satuan');
        $this -> db -> select('nm_satuan');
        $this -> db -> from('tb_satuan');
        $this -> db -> order_by('id_satuan', 'ASC');
        return $this -> db -> get() -> result();
    } 
    public function getDataBarang() {
        $this -> db -> select('id_barang');
        $this -> db -> select('nm_barang');
        $this -> db -> select('id_satuan');
        $this -> db -> select('harga');
        $this -> db -> select('id_satuan');
        $this -> db -> select('id_gudang');
        $this -> db -> select('stok');
        $this -> db -> select('id_supplier');
        $this -> db -> from('tb_barang');
        $this -> db -> order_by('id_barang');
        return $this -> db -> get() -> result();
    } 
    public function DataRequestBarang() {
        $this -> db -> select('id_barang');
        $this -> db -> select('id_user_request');
        $this -> db -> select('id_satuan');
        $this -> db -> select('tanggal_req');
        $this -> db -> select('status_req');
        $this -> db -> select('jumlah');
        $this -> db -> select('no_po');
        $this -> db -> select('id_gudang');
        $this -> db -> from('tb_request');
        $this -> db -> order_by('id_barang', 'ASC');
        return $this -> db -> get() -> result();
    } 
    public function DaftarRequestBarang() {
        $this -> db -> select('id_barang');
        $this -> db -> select('id_user_request');
        $this -> db -> select('id_satuan');
        $this -> db -> select('tanggal_req');
        $this -> db -> select('status_req');
        $this -> db -> select('jumlah');
        $this -> db -> select('no_po');
        $this -> db -> select('id_gudang');
        $this -> db -> from('tb_request');
        //$this -> db -> where('status_req', 1);
        //$this -> db -> or_where('status_req', 6);
        $this -> db -> order_by('id_barang', 'ASC');
        return $this -> db -> get() -> result();
    } 
    public function DaftarForSupplier() {
        $this -> db -> select('id_barang');
        $this -> db -> select('id_user_request');
        $this -> db -> select('id_satuan');
        $this -> db -> select('tanggal_req');
        $this -> db -> select('status_req');
        $this -> db -> select('jumlah');
        $this -> db -> select('no_po');
        $this -> db -> select('id_gudang');
        $this -> db -> from('tb_request');
        $this -> db -> where('status_req', 3);
        $this -> db -> or_where('status_req', 6);
        $this -> db -> order_by('id_barang', 'ASC');
        return $this -> db -> get() -> result();
    } 
    public function datadarisupplier($nopo){
        return $this -> db -> query("SELECT a.id,a.harga,a.id_barang,a.id_supplier,a.no_po,b.no_po po,b.status_req,b.id_gudang,b.id_user_request,b.tanggal_req,b.jumlah,b.id_satuan FROM tb_form_supplier a RIGHT JOIN tb_request b ON a.no_po = b.no_po WHERE b.no_po = '".$nopo."' ORDER BY a.harga ASC ") -> result();
    }
    public function DataBeliBarang() {
        $this -> db -> select('id_barang');
        $this -> db -> select('id_user_request');
        $this -> db -> select('id_satuan');
        $this -> db -> select('tanggal_req');
        $this -> db -> select('status_req');
        $this -> db -> select('jumlah');
        $this -> db -> select('no_po');
        $this -> db -> select('id_gudang');
        $this -> db -> from('tb_request');
        $this -> db -> where('status_req', 3);
        $this -> db -> or_where('status_req', 4);
        $this -> db -> order_by('id_barang', 'ASC');
        return $this -> db -> get() -> result();
    } 
    public function tambah(){
        $data = array(  'nm_barang'     => $this->input->post('namabarang'),
                        'stok'          => 0,
                            );
        return $this -> db -> insert('tb_barang',$data);
    }
    public function tambahRequest(){
        $data = array(  'id_barang'         => $this->input->post('barang'),
                        'id_user_request'   => $this->input->post('iduser'),
                        'tanggal_req'       => $this->input->post('tgl'),
                        'id_gudang'         => $this->input->post('gudang'),
                        'jumlah'            => $this->input->post('stok'),
                        'id_satuan'         => $this->input->post('satuan'),
                        'status_req'        => 1,
                        'no_po'             => $this ->getKodeUnik(),
                            );
        return $this -> db -> insert('tb_request',$data);
    }
    public function tambahHarga(){
        $ids = $this->input->post('idsupplier');
        $po = $this->input->post('nopo');
        $data = array(  'id_barang'         => $this->input->post('idbarang'),
                        'id_supplier'       => __nama('tb_users', 'username', $ids, 'id'),
                        'harga'             => $this->input->post('harga'),
                        'no_po'             => $po,
                        'id_gudang'         => __nama('tb_request', 'no_po', $po, 'id_gudang'),
                        'id_satuan'         => __nama('tb_request', 'no_po', $po, 'id_satuan'),
                        'jumlah'            => __nama('tb_request', 'no_po', $po, 'jumlah'),
                            );
        return $this -> db -> insert('tb_form_supplier',$data);
    }
    public function dataLaporan(){
        return $this -> db -> query("SELECT a.no_po,a.id_gudang,a.tanggal_req,a.status_req,a.jumlah,a.id_user_request,a.id_barang,a.id_satuan FROM tb_request a WHERE a.status_req = '4'") -> result();
    }
    public function cetakLaporan($po){
        return $this -> db -> query("SELECT a.no_po,a.id_gudang,a.tanggal_req,a.status_req,a.jumlah,a.id_user_request,a.id_barang,a.id_satuan,b.id_supplier FROM tb_request a,tb_barang b WHERE a.status_req = '4' AND a.no_po = '".$po."' GROUP BY a.no_po") -> row();
    }
    public function detail($id){
        $data = array('id_barang' => $id);
        return $this->db->get_where('tb_barang', $data) -> row();
    }
    public function formDetailRequest($id){
        $data = array('no_po' => $id);
        return $this->db->get_where('tb_request', $data) -> row();
    }
    public function asd(){
        return $this -> db -> query("SELECT tb_request.*,tb_form_supplier.* FROM tb_request LEFT JOIN tb_form_supplier ON tb_request.no_po = tb_form_supplier.no_po WHERE tb_form_supplier.flag = '1' OR tb_request.status_req = '6' OR tb_request.status_req = '3'") -> result();
        //return $this -> db -> query("SELECT tb_request.*,tb_form_supplier.* FROM tb_request LEFT JOIN tb_form_supplier ON tb_request.no_po = tb_form_supplier.no_po") -> result(); // WHERE tb_request.no_po = '".$id."'
    }
    public function formHasilRequest($id){
        $data = array('no_po' => $id);
        return $this->db->get_where('tb_form_supplier', $data) -> row();
    }
    public function detailRequest($id){
        $data = array('id_barang' => $id);
        return $this->db->get_where('tb_request', $data) -> row();
    }
    public function approveRequest($id){
        $data = array('status_req' => 3);
        $this -> db -> where('id_permintaan', $id);
        return $this -> db -> update('tb_request',$data);
    }
    public function rejectRequest($id){
        $data = array('status_req' => 2);
        $this -> db -> where('id_permintaan', $id);
        return $this -> db -> update('tb_request',$data);
    }
    public function tambahBeli($id){
        $data = array(  'id_supplier' => $this -> input -> post('supplier'),
                        'stok' => $this -> input -> post('stok'),
                    );
        $this -> db -> where('id_barang', $id);
        return $this -> db -> update('tb_barang',$data);
    }
     public function updateBeli($id){
        $data = array(  'status_req' => 4,
                    );
        $this -> db -> where('id_permintaan', $id);
        return $this -> db -> update('tb_request',$data);
    }
    public function getKodeUnik() { 
        $query = $this -> db -> query("SELECT MAX(RIGHT(no_po,4)) AS idpo FROM tb_request");
        $kode = "";
        if($query -> num_rows() > 0){ 
            foreach($query -> result() as $k){
                $tmp = ((int)$k -> idpo) + 1;
                $kode = sprintf("%04s", $tmp);
            }
        }else{
            $kode = "0001";
        }
        $po = "PO-";
        return $po.$kode;
   }
}
