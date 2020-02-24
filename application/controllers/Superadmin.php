<?php 
class Superadmin extends CI_Controller{
	public function index(){
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sesi anda bukan disini!</div>');
			redirect('auth');
		}

		$this->load->view('templates/header');
	}
}

 ?>