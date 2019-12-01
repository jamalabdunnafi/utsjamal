<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
	}

	public function index()
	{
		$data = [
			'data' => $this->mahasiswa_model->lihat()->result()
		];
		$this->load->view('mahasiswa/index', $data);
	}

	public function add()
	{
		$data = array(
			'jk' => $this->mahasiswa_model->jk()->result()
		);
		$this->load->view('mahasiswa/add', $data);
	}

	public function add_aksi($value='')
	{
		$nim = $this->input->post("nim");
		$nama = $this->input->post("nama");
		$jk = $this->input->post("jk");
		$alamat = $this->input->post("alamat");
		$no_hp = $this->input->post("no_hp");

		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'jk' => $jk,
			'no_hp' => $no_hp,
		);

		$query = $this->mahasiswa_model->tambah($data);
		if ($query > 0) {			
			$this->session->set_flashdata('item', '<div class="alert alert-success">simpan berhasil</div>');
			redirect('mahasiswa','refresh');
		}
		else {
			$this->session->set_flashdata('item', '<div class="alert alert-danger">simpan gagal</div>');
		}
	}

	public function edit($nim)
	{
		$data = array(
			'jk' => $this->mahasiswa_model->jk()->result(),
			'mahasiswa' => $this->mahasiswa_model->lihat(['nim'=> $nim])->row()
		);
		$this->load->view('mahasiswa/edit', $data);
	}

	public function update($value='')
	{
		$nim = $this->input->post("nim");
		$nama = $this->input->post("nama");
		$jk = $this->input->post("jk");
		$alamat = $this->input->post("alamat");
		$no_hp = $this->input->post("no_hp");
		$old_nim = $this->input->post("old_nim");

		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'jk' => $jk,
			'no_hp' => $no_hp,
		);

		$query = $this->mahasiswa_model->update($old_nim, $data);
		if ($query > 0) {			
			$this->session->set_flashdata('item', '<div class="alert alert-success">update berhasil</div>');
		}
		else {
			$this->session->set_flashdata('item', '<div class="alert alert-danger">update gagal</div>');
		}
		redirect('mahasiswa','refresh');
	}

	public function delete($id)
	{
		$query = $this->mahasiswa_model->delete($id);
		if ($query > 0) {			
			$this->session->set_flashdata('item', '<div class="alert alert-success">delete berhasil</div>');
		}
		else {
			$this->session->set_flashdata('item', '<div class="alert alert-danger">delete gagal</div>');
		}
		redirect('mahasiswa','refresh');
	}

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */