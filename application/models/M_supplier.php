<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {

	public function getData(){
            return $this -> db -> query("SELECT id_supplier,nm_supplier,no_hp,keterangan,flag_supplier FROM tb_supplier WHERE flag_supplier = '1'") -> result();
	}
        public function tambah(){
            $data = array(  'nm_supplier'   => $this->input->post('nama'),
                            'no_hp'         => $this->input->post('phone'),
                            'email'         => $this->input->post('email'),
                            'alamat'        => $this->input->post('alamat'),
                        );
            $this->db->insert('tb_supplier',$data);
        }
        public function edit(){
            $data = array(  'nm_supplier'   => $this->input->post('nama'),
                            'no_hp'         => $this->input->post('phone'),
                            'email'         => $this->input->post('email'),
                            'alamat'        => $this->input->post('alamat'),
                                );
            $this->db->where('id_supplier',$this->uri->segment(2));
            $this->db->update('tb_supplier',$data);
        }
         public function detail($id){
            $data = array('id_supplier' => $id);
            return $this->db->get_where('tb_supplier',$data);
        }
         public function delete(){
            $data = array('flag_supplier' => 2);
            $this->db->where('id_supplier',$this->uri->segment(2));
            $this->db->update('tb_supplier',$data);
        }
}
