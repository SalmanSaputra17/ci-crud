<?php

class Mahasiswa extends CI_Controller 
{
	private $title;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mahasiswa_model');
		$this->load->library('form_validation');

		$this->title = 'Mahasiswa | ';
	}

	public function index()
	{
		$data['title'] = $this->title . 'index';
		$data['mahasiswa'] = $this->Mahasiswa_model->all();

		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = $this->title . 'Tambah';

		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/create');
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = $this->title . 'Tambah';

			$this->load->view('templates/header');
			$this->load->view('mahasiswa/create');
			$this->load->view('templates/footer');
		} else {
			$this->Mahasiswa_model->save();
			$this->session->set_flashdata('info', 'Data berhasil ditambahkan.');

			redirect('mahasiswa');
		}
	}

	public function delete($id)
	{
		$this->Mahasiswa_model->delete($id);
		$this->session->set_flashdata('info', 'Data berhasil dihapus.');

		redirect('mahasiswa');
	}
}