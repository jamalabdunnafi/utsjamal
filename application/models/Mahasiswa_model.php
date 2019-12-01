<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

	public function lihat($value=array())
	{
		$this->db->select('*');
		$this->db->where($value);
		return $this->db->get('view_mahasiswa');
	}

	public function jk()
	{
		return $this->db->get('jk');
	}

	public function tambah($data)
	{
		$this->db->insert('mahasiswa', $data);
		return $this->db->affected_rows();
	}

	public function update($nim, $data)
	{
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa', $data);
		return $this->db->affected_rows();
	}

	public function delete($nim)
	{
		$this->db->where('nim', $nim);
		$this->db->delete('mahasiswa');
		return $this->db->affected_rows();
	}

}

/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */