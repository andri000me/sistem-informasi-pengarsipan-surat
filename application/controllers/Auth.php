<?php
class Auth extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('level')) {
			redirect('admin');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Username tidak boleh kosong!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password tidak boleh kosong!']);

		if ($this->form_validation->run() == false) {
			$data['main_title'] = 'E-Arsip';
			$data['title'] = 'Login';
			$this->load->view('login', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($cek) {
			if (sha1($password) == $cek['password']) {
				$userdata = [
					'id_user' => $cek['id_user'],
					'username' => $cek['username'],
					'level' => $cek['level']
				];

				$this->session->set_flashdata('message', "<script>Swal.fire(
						'Login berhasil!',
						'You clicked the button!',
						'success'
						)</script>");
				$this->session->set_userdata($userdata);
				redirect('admin');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak terdaftar!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout sukses!</div>');
		redirect('auth');
	}
}
