<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->cek_login(1);
	}

	private function meta()
	{
		$data = array(
			"judul"			=> "User",
			"keterangan"	=> "Manajemen Pengguna",
			"halaman"		=> "user",
			"breadcrumb"	=> "Master Data|User",
			"view"			=> "user",
			"data_user"		=> $this->M_Universal->getMulti(NULL, "user"),
		);

		return $data;
	}

	public function index()
	{
		$this->load->view('template', $this->meta());
	}

	public function edit()
	{
		$data			= $this->meta();
		$data["edit"]	= $this->M_Universal->getOne(["user_id" => dekrip(uri(3))], "user");

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('user_nama', 'username', 'required|trim');
		$this->form_validation->set_rules('user_password', 'password', 'required|trim');
		$this->form_validation->set_rules('user_namalengkap', 'nama lengkap', 'required|trim');
		if ($this->form_validation->run()  == true) {
			$data = array(
				"user_nama"			=> $this->input->post("user_nama"),
				"user_password"		=> password_hash($this->input->post("user_password"), PASSWORD_BCRYPT),
				"user_namalengkap"	=> $this->input->post("user_namalengkap"),
				"user_level"		=> $this->input->post("user_level")
			);
			$tambah = $this->M_Universal->insert($data, "user");
			($tambah) ? $this->notification->success("Berhasil tambah user!") : $this->notification->error("Gagal tambah user!!");
		} else {
			$this->notification->error(str_replace("\r\n", "", json_encode(strip_tags(validation_errors()))));
		}
		redirect('user');
	}

	public function update()
	{
		$user_id		= dekrip($this->input->post("user_id"));
		$user_password	= $this->input->post("user_password");
		$cek			= $this->M_Universal->getOneSelect("user_password", ["user_id" => $user_id], "user");
		$this->form_validation->set_rules('user_nama', 'username', 'required|trim');
		$this->form_validation->set_rules('user_password', 'password', 'required|trim');
		$this->form_validation->set_rules('user_namalengkap', 'nama lengkap', 'required|trim');
		if ($this->form_validation->run()  == true) {
			$data			= array(
				"user_nama"			=> $this->input->post("user_nama"),
				"user_password"		=> $user_password != $cek->user_password ? password_hash($user_password, PASSWORD_BCRYPT) : $user_password,
				"user_namalengkap"	=> $this->input->post("user_namalengkap"),
				"user_level"		=> $this->input->post("user_level")
			);
			$update = $this->M_Universal->update($data, ["user_id" => $user_id], "user");
			($update) ? $this->notification->success("Berhasil ubah user!") : $this->notification->error("Gagal ubah user!!");
		}
		redirect('user');
	}

	public function hapus()
	{
		$id_user = dekrip(uri(3));
		if (empty($id_user)) redirect('user');
		$hapus = $this->M_Universal->delete(["user_id" => $id_user], "user");
		($hapus) ? $this->notification->success('Berhasil hapus user!!') : $this->notification->error("Gagal hapus user!");
		redirect('user');
	}
}
