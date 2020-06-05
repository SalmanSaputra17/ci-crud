<?php

class Mahasiswa extends CI_Controller 
{
	private $title;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mahasiswa_model', 'Mahasiswa');
		$this->load->library('form_validation');
		$this->load->library('pagination');

		$this->title = 'Mahasiswa | ';
	}

	public function index()
	{
		$data['title'] = $this->title . 'index';

		if (!is_null($this->input->post('filter'))) {
			$data['filter'] = $this->input->post('filter'); 
			$this->session->set_userdata('filter', $data['filter']);
		} else {
			$data['filter'] = $this->session->userdata('filter');
		}

		$this->db->like('nama', $data['filter']);
		$this->db->or_like('nrp', $data['filter']);
		$this->db->or_like('email', $data['filter']);
		$this->db->or_like('jurusan', $data['filter']);
		$this->db->from($this->Mahasiswa->getSource());

		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$data['mahasiswa'] = $this->Mahasiswa->all($config['per_page'], $this->uri->segment(3), $data['filter']);

		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = $this->title . 'Tambah';
		$data['jurusan'] = $this->Mahasiswa->listJurusan();

		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/create', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = $this->title . 'Tambah';
			$data['jurusan'] = $this->Mahasiswa->listJurusan();

			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Mahasiswa->save();
			$this->session->set_flashdata('info', 'Data berhasil ditambahkan.');

			redirect('mahasiswa');
		}
	}

	public function detail($id)
	{
		echo json_encode($this->Mahasiswa->findById($id));
	}

	public function edit($id)
	{
		$data['title'] = $this->title . 'Ubah';
		$data['jurusan'] = $this->Mahasiswa->listJurusan();
		$data['model'] = $this->Mahasiswa->findById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = $this->title . 'Ubah';
			$data['jurusan'] = $this->Mahasiswa->listJurusan();
			$data['model'] = $this->Mahasiswa->findById($id);

			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Mahasiswa->update();
			$this->session->set_flashdata('info', 'Data berhasil diubah.');

			redirect('mahasiswa');
		}
	}

	public function delete($id)
	{
		$this->Mahasiswa->delete($id);
		$this->session->set_flashdata('info', 'Data berhasil dihapus.');

		redirect('mahasiswa');
	}
}