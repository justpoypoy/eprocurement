<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_gudang');
    }
	public function index(){
            $this -> data['title']   = 'Data Gudang - E-Procurement';
            $this -> data['gudang'] = $this -> M_gudang -> getData();
            $this -> data['isi']     = 'Gudang/gudang_v';
            $this -> load -> view('Layout/tema',$this -> data);
	}
        public function addGudang(){
            if(isset($_POST['submit'])){
                $this -> M_gudang -> tambah();
                $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h4><i class="icon fa fa-check"></i> Tambah gudang berhasil</h4>
                                                        </div>');
                redirect('data-gudang');
            }else{
            $this->data['title'] = 'Tambah User - E-Procurement';
            $this->data['isi']  = 'Gudang/add_v';
            $this -> load -> view('layout/tema',$this -> data);
            }
        }
        public function editGudang(){
            if(isset($_POST['submit'])){
                $this -> M_gudang -> edit();
                $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <h4><i class="icon fa fa-check"></i> Rubah gudang berhasil</h4>
                                                            </div>');
                redirect('data-gudang');
            }else{
            $id = $this -> uri -> segment(2);
            $this->data['row']   = $this -> M_gudang -> detail($id) -> row();     
            $this->data['title'] = 'Edit Gudang - E-Procurement';
            $this->data['isi']  = 'Gudang/edit_v';
            $this->load->view('layout/tema',$this -> data);
            }
        }
        public function deleteGudang(){
            $this->M_gudang->delete();
            $this->session->set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h4><i class="icon fa fa-check"></i> Hapus gudang berhasil</h4>
                                                    </div>');
            redirect('data-gudang');
        }
}
