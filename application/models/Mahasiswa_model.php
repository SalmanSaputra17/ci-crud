<?php

class Mahasiswa_model extends CI_Model 
{
	private $table = 'mahasiswa';

	public function all()
	{
		return $this->db->get($this->table)->result();
	}

	public function save()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'nrp' => $this->input->post('nrp', true),
			'email' => $this->input->post('email', true),
			'jurusan' => $this->input->post('jurusan', true),
		];

		$this->db->insert($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
}