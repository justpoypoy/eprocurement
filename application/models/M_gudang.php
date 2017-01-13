<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gudang extends CI_Model {

	public function getData(){
            return $this -> db -> query("SELECT id_gudang,nm_gudang,flag_gudang FROM tb_gudang WHERE flag_gudang = '1'") -> result();
	}
        public function tambah(){
            $data = array(  'nm_gudang'    => $this->input->post('nama'),
                            'flag_gudang'  => 1,
                                );
            $this->db->insert('tb_gudang',$data);
        }
        public function edit(){
              $data = array('nm_gudang'    => $this->input->post('nama'),
                            'flag_gudang'  => 1,
                                );
            $this->db->where('id_gudang',$this->uri->segment(2));
            $this->db->update('tb_gudang',$data);
        }
         public function detail($id){
            $data = array('id_gudang' => $id);
            return $this->db->get_where('tb_gudang',$data);
        }
         public function delete(){
            $data = array('flag_gudang' => 2);
            $this->db->where('id_gudang',$this->uri->segment(2));
            $this->db->update('tb_gudang',$data);
        }
}
