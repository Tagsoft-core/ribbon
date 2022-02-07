<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Branch extends CI_Controller
{
	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('RibbonModel', 'ribbon');
		$this->form_validation->set_error_delimiters('<div class="badge badge-danger">', '</div>');
		if (!$this->session->userdata('loggedIn')) {
			redirect(base_url() . 'index.php/auth');
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		if (empty($_FILES['image']['name'])) {
			$this->form_validation->set_rules('image', 'Image', 'required');
		}

		if ($this->form_validation->run() === TRUE) {
			if ($this->do_upload()) {
				$this->data['ribbonBranchData'] = [
					'name' => $this->input->post('name'),
					'image' => '/uploads/ribbon_branch/' . $this->data['uploaded']['file_name'],
					'created_by' => $this->session->userdata('id')
				];

				$this->ribbon->insert($this->data['ribbonBranchData'], 'branch');
				redirect(base_url() . 'index.php/branch/ribbonBranchList');
			} else {
				$this->session->set_flashdata('error', $this->data['uploadError']);
				$this->load->view('shared/header');
				$this->load->view('ribbon/branch');
				$this->load->view('shared/footer');
			}
		}
		$this->load->view('shared/header');
		$this->load->view('ribbon/branch');
		$this->load->view('shared/footer');

	}

	private function do_upload()
	{
		$config['upload_path'] = './uploads/ribbon_branch/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '929833';
		$config['max_width'] = '2196';
		$config['max_height'] = '2796';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = FALSE;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$new_name = time() . $_FILES["image"]['name'];
		$config['file_name'] = $new_name;
		if (!is_dir($config['upload_path'])) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$this->data['uploadError'] = $this->upload->display_errors();
			return false;
		} else {
			$this->data['uploaded'] = $this->upload->data();
			return true;
		}
	}

	public function ribbonBranchList()
	{
		$this->data['branches'] = $this->ribbon->getAll('branch');
		$this->load->view('shared/header');
		$this->load->view('ribbon/branch_list', $this->data);
		$this->load->view('shared/footer');
	}
}
