<?php

class Mahasiswa_model extends CI_Model 
{
	public function getSource()
	{
		return 'mahasiswa';
	}

	public function all($limit, $offset, $filter = null)
	{	
		if (!is_null($filter)) {
			$this->db->like('nama', $filter);
			$this->db->or_like('nrp', $filter);
			$this->db->or_like('email', $filter);
			$this->db->or_like('jurusan', $filter);
		}

		return $this->db->get($this->getSource(), $limit, $offset)->result();
	}

	public function save()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'nrp' => $this->input->post('nrp', true),
			'email' => $this->input->post('email', true),
			'jurusan' => $this->input->post('jurusan', true),
		];

		$this->db->insert($this->getSource(), $data);
	}

	public function findById($id)
	{
		return $this->db->get_where($this->getSource(), ['id' => $id])->row();
	}

	public function update()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'nrp' => $this->input->post('nrp', true),
			'email' => $this->input->post('email', true),
			'jurusan' => $this->input->post('jurusan', true),
		];

		$this->db->update($this->getSource(), $data, ['id' => $this->input->post('id', true)]);	
	}

	public function delete($id)
	{
		$this->db->delete($this->getSource(), ['id' => $id]);
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