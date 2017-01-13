<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_user');
    }    
	public function index(){
            $this->data['title'] = 'Data Barang - E-Procurement';
            $this->data['isi']  = 'User/user_v';
            $this->data['user'] = $this -> M_user -> getData();
            $this->load->view('layout/tema',$this->data);
	}
        public function addUser(){
            if(isset($_POST['submit'])){
                $this -> M_user -> tambah();
                $this -> session -> set_flashdata('pesan',  '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h4><i class="icon fa fa-check"></i> Tambah user berhasil</h4>
                                                        </div>');
                redirect('data-user');
            }else{
            $this->data['title'] = 'Tambah User - E-Procurement';
            $this->data['isi']  = 'User/add_v';
            $this->data['user'] = $this -> M_user -> getData();
            $this -> load -> view('layout/tema',$this -> data);
            }
        }
        public function editUser(){
            if(isset($_POST['submit'])){
                $this -> M_user -> edit();
                $this -> session -> set_flashdata('pesan',   '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h4><i class="icon fa fa-check"></i> Rubah user berhasil</h4>
                                                        </div>');
                redirect('data-user');
            }else{
            $id = $this -> uri -> segment(2);
            $this->data['row']   = $this -> M_user -> detail($id) -> row();     
            $this->data['title'] = 'Edit Pegawai - E-Procurement';
            $this->data['isi']  = 'User/edit_v';
            //$this->data['user'] = $this->M_user->getData();
            $this->load->view('layout/tema',$this -> data);
            }
        }
        public function deleteUser(){
            $this->M_user->delete();
            $this->session->set_flashdata('pesan',   '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h4><i class="icon fa fa-check"></i> Hapus user berhasil</h4>
                                                    </div>');
            redirect('data-user');
        }
        public function cekUsername(){
            $username = $_POST['username'];
            $hasil = $this -> M_user -> cek_username($username);
            if($hasil->uname != 0){
                echo "1"; 
            }else{
                echo "2";
            }
        }
}
