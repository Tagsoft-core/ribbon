<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attachment extends CI_Controller
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
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('option_type', 'Ribbon Option Type', 'required');
		if (empty($_FILES['image']['name'])) {
			$this->form_validation->set_rules('image', 'Image', 'required');
		}
		if ($this->input->post('option_type') == 1) {
			$this->form_validation->set_rules('option', 'Ribbon Options', 'required');
		}

		if ($this->form_validation->run() === TRUE) {
			if ($this->do_upload()) {
				$this->data['ribbonAttachmentData'] = [
					'name' => $this->input->post('name'),
					'option_type' => $this->input->post('option_type'),
					'options' => $this->input->post('option'),
					'multiple' => $this->input->post('multiple'),
					'price' => $this->input->post('price'),
					'image' => '/uploads/ribbon_attachment/' . $this->data['uploaded']['file_name'],
					'created_by' => $this->session->userdata('id')
				];

				$this->ribbon->insert($this->data['ribbonAttachmentData'], 'attachments');
				redirect(base_url() . 'index.php/attachment/ribbonAttachmentsList');
			} else {
				$this->session->set_flashdata('error', $this->data['uploadError']);
				$this->load->view('shared/header');
				$this->load->view('ribbon/attachment');
				$this->load->view('shared/footer');
			}
		}
		$this->load->view('shared/header');
		$this->load->view('ribbon/attachment');
		$this->load->view('shared/footer');

	}

	private function do_upload()
	{
		$config['upload_path'] = './uploads/ribbon_attachment/';
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

	public function ribbonAttachmentsList()
	{
		$this->data['attachments'] = $this->ribbon->getAll('attachments');
		$this->load->view('shared/header');
		$this->load->view('ribbon/attachment_list', $this->data);
		$this->load->view('shared/footer');
	}

	public function edit($id)
	{
		$this->data['attachment'] = $this->ribbon->getWhere('attachments', $id);
		if ($this->input->post('option')) {
			$this->ribbon->updateAttachment($id, $this->input->post('option'));
			$this->data['attachment'] = $this->ribbon->getWhere('attachments', $id);
		}
		$this->load->view('shared/header');
		$this->load->view('ribbon/attachment_edit', $this->data);
		$this->load->view('shared/footer');
	}

	public function addOptions($attachmentId)
	{
		$this->form_validation->set_rules('option', 'Ribbon Options', 'required');
		$this->form_validation->set_rules('name', 'Ribbon Name', 'required');
		if (empty($_FILES['image']['name'])) {
			$this->form_validation->set_rules('image', 'Image', 'required');
		}

		if ($this->form_validation->run() === TRUE) {

			if ($this->do_upload()) {
				$data = [
					'attachment_id' => $attachmentId,
					'name' => $this->input->post('name'),
					'options' => $this->input->post('option'),
					'image' => '/uploads/ribbon_attachment/' . $this->data['uploaded']['file_name']
				];

				$this->ribbon->insert($data, 'attachment_options');
				redirect(base_url() . 'index.php/attachment/ribbonAttachmentsList');
			} else {
				$this->session->set_flashdata('error', $this->data['uploadError']);
				$this->data['options'] = $this->ribbon->getAttachmentOptions($attachmentId);
				$this->data['attachment'] = $this->ribbon->getWhere('attachments', $attachmentId);
				$this->load->view('shared/header');
				$this->load->view('ribbon/attachment_option_edit', $this->data);
				$this->load->view('shared/footer');
			}

		} else {
			$this->data['options'] = $this->ribbon->getAttachmentOptions($attachmentId);
			$this->data['attachment'] = $this->ribbon->getWhere('attachments', $attachmentId);
			$this->load->view('shared/header');
			$this->load->view('ribbon/attachment_option_edit', $this->data);
			$this->load->view('shared/footer');
		}

	}
}
