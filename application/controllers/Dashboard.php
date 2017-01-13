<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
                $this->data['title']   = 'Halaman Utama - E-Procurement';
                $this->data['isi']     = 'Layout/dashboard_v';
                $this->load->view('Layout/tema',$this->data);
	}
}
