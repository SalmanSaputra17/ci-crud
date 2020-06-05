<?php

class Mahasiswa_model extends CI_Model 
{
	private $table = 'mahasiswa';

	public function all($filter = "")
	{	
		if (!empty($filter)) {
			$this->db->like('nama', $filter);
			$this->db->or_like('nrp', $filter);
			$this->db->or_like('email', $filter);
			$this->db->or_like('jurusan', $filter);
		}

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

	public function findById($id)
	{
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	public function update()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'nrp' => $this->input->post('nrp', true),
			'email' => $this->input->post('email', true),
			'jurusan' => $this->input->post('jurusan', true),
		];

		$this->db->update($this->table, $data, ['id' => $this->input->post('id', true)]);	
	}

	public function delete($id)
	{
		$this->db->delete($this->table, ['id' => $id]);
	}

	public function listJurusan()
	{
		return [
			[
				'key' => 'RPL',
				'name' => 'RPL'
			],
			[
				'key' => 'TKJ',
				'name' => 'TKJ'
			],
			[
				'key' => 'MMD',
				'name' => 'MMD'
			],
		];
	}
}