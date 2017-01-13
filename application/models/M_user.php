<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function getData(){
            return $this->db->query("SELECT nama,username,akses_level,status FROM tb_users WHERE status = '1'")->result();
	}
        public function tambah(){
            $pass = $this->input->post('password');
            if($pass == ''){
                $oto = sha1(12345);
                }else{
                $oto = sha1($pass);
                }
            $data = array(  'nama'      => $this->input->post('nama'),
                            'username'  => strtolower($this->input->post('username')),
                            'password'  => $oto,
                            'no_hp'     => $this->input->post('nohp'),
                            'email'     => $this->input->post('email'),
                            'akses_level'=> $this->input->post('akses'),
                            'status'    => $this->input->post('status'),
                                );
            $this->db->insert('tb_users',$data);
        }
        public function tambahsupplier(){
            $data = array(  'nama'      => $this->input->post('nama'),
                            'username'  => strtolower($this->input->post('username')),
                            'password'  => sha1($this->input->post('password')),
                            'no_hp'     => $this->input->post('phone'),
                            'email'     => $this->input->post('email'),
                            'akses_level'=> 6,
                            'status'    => 1,
                                );
            $this->db->insert('tb_users',$data);
        }
        public function edit(){
              $data = array('nama'      => $this->input->post('nama'),
                            'no_hp'     => $this->input->post('nohp'),
                            'email'     => $this->input->post('email'),
                            'akses_level'=> $this->input->post('akses'),
                            'status'    => $this->input->post('status'),
                                );
                                //print_r($data);die;
            $this->db->where('username',$this->input->post('username'));
            $this->db->update('tb_users',$data);
        }
         public function detail($id){
            $data = array('username' => $id);
            return $this->db->get_where('tb_users',$data);
        }
         public function delete(){
            $data = array('status' => 2);
            $this->db->where('username',$this->uri->segment(2));
            $this->db->update('tb_users',$data);
        }
        public function cek_username($username){
            return $this->db->query("SELECT COUNT(username) AS uname FROM tb_users WHERE username = '".$username."'") -> row();
        }
}
