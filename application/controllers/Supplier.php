<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_supplier');
    }
	public function index(){
            $this -> data['title']    = 'Data Supplier - E-Procurement';
            $this -> data['supplier'] = $this -> M_supplier -> getData();
            $this -> data['isi']      = 'Supplier/supplier_v';
            $this -> load -> view('Layout/tema',$this -> data);
	}
        public function addSupplier(){
            if(isset($_POST['submit'])){
                $this -> M_supplier -> tambah();
                $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <h4><i class="icon fa fa-check"></i> Tambah supplier berhasil</h4>
                                                            </div>');
                redirect('data-supplier');
            }else{
            $this->data['title'] = 'Tambah Supplier - E-Procurement';
            $this->data['isi']  = 'Supplier/add_v';
            $this -> load -> view('layout/tema',$this -> data);
            }
        }
        public function editSupplier(){
            if(isset($_POST['submit'])){
                $this -> M_supplier -> edit();
                $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <h4><i class="icon fa fa-check"></i> Rubah supplier berhasil</h4>
                                                            </div>');
                redirect('data-supplier');
            }else{
            $id = $this -> uri -> segment(2);
            $this->data['row']   = $this -> M_supplier -> detail($id) -> row();     
            $this->data['title'] = 'Edit Supplier - E-Procurement';
            $this->data['isi']  = 'Supplier/edit_v';
            $this->load->view('layout/tema',$this -> data);
            }
        }
        public function deleteSupplier(){
            $this->M_supplier->delete();
            $this->session->set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h4><i class="icon fa fa-check"></i> Hapus supplier berhasil</h4>
                                                    </div>');
            redirect('data-supplier');
        }
}
