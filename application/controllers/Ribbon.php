<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ribbon extends CI_Controller
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
        $this->data['types'] = $this->ribbon->getAll('type');
        $this->data['branches'] = $this->ribbon->getAll('branch');
        $this->data['attachments'] = $this->ribbon->getAll('attachments');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('type', 'Ribbon Type', 'required');
        $this->form_validation->set_rules('branch', 'Ribbon Branch', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

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
                    'type_id' => $this->input->post('type'),
                    'branch_id' => $this->input->post('branch'),
                    'state_id' => 1,
                    'ribbon_type' => 1,
                    'price' => $this->input->post('price'),
                    'image' => '/uploads/ribbons/' . $this->data['uploaded']['file_name'],
                    'created_by' => $this->session->userdata('id')
                ];

                $this->data['ribbonId'] = $this->ribbon->insert($this->data['ribbonAttachmentData'], 'ribbons');

                if (!empty($this->input->post('attachments'))) {
                    foreach ($this->input->post('attachments') as $attachment) {
                        $this->data['attachmentData'] = [
                            'ribbon_id' => $this->data['ribbonId'],
                            'attachment_id' => $attachment,
                        ];

                        $this->ribbon->insert($this->data['attachmentData'], 'ribbons_attachments');
                    }
                }

                redirect(base_url() . 'index.php/ribbon/ribbonList');
            } else {
                $this->session->set_flashdata('error', $this->data['uploadError']);

                $this->load->view('shared/header');
                $this->load->view('ribbon/ribbon', $this->data);
                $this->load->view('shared/footer');
            }
        }

        $this->load->view('shared/header');
        $this->load->view('ribbon/ribbon', $this->data);
        $this->load->view('shared/footer');

    }

    private function do_upload()
    {
        $config['upload_path'] = './uploads/ribbons/';
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

    public function ribbonType($type = null, $branch = null)
    {
        if (empty($type)) {
            $this->data['data'] = $this->ribbon->getAll('type');

            $this->load->view('shared/header');
            $this->load->view('ribbon/select_ribbon', $this->data);
            $this->load->view('shared/footer');
        } elseif (empty($branch)) {
            $this->data['type'] = $type;
            $this->data['data'] = $this->ribbon->getAll('branch');

            $this->load->view('shared/header');
            $this->load->view('ribbon/select_ribbon', $this->data);
            $this->load->view('shared/footer');
        } else {
            redirect(base_url() . 'index.php/ribbon/ribbonList/' . $type . '/' . $branch);
        }
    }

    public function ribbonList($type = null, $branch = null)
    {
        $this->data['ribbons'] = $this->ribbon->getRibbonsWithAttachment($type, $branch);

        $this->load->view('shared/header');
        $this->load->view('ribbon/ribbon_list', $this->data);
        $this->load->view('shared/footer');
    }

    public function ribbonWithAttachments($id = null)
    {
        if (null === $id) {
            redirect(base_url() . 'index.php/ribbon');
        }
        $this->data['ribbon'] = $this->ribbon->getWhere('ribbons', $id);
        $this->data['allAttachments'] = $this->ribbon->getAll('attachments');

        $this->data['attachments'] = $this->ribbon->getRibbonAttachments($id);
        //$key = array_search('15', array_column($this->data['allAttachments'], 'id'));
//        echo '<pre>';
//        var_dump($this->data['attachments']);
//        exit();
        $this->load->view('shared/header');
        $this->load->view('ribbon/ribbon_attachments', $this->data);
        $this->load->view('shared/footer');
    }

    public function attachAttachmentRibbon()
    {
        $this->form_validation->set_rules('ribbon_id', 'Ribbon', 'required');

        if (empty($this->input->post('attachments'))) {
            $this->form_validation->set_rules('attachments', 'Attachments', 'required');
        }

        if ($this->form_validation->run() === TRUE) {
            $id = $this->input->post('ribbon_id');

            foreach ($this->input->post('attachments') as $attachment) {
                $this->data['attachmentData'] = [
                    'ribbon_id' => $id,
                    'attachment_id' => $attachment,
                ];

                $this->ribbon->insert($this->data['attachmentData'], 'ribbons_attachments');
            }

            $this->session->set_flashdata('success', 'Attachment added successfully');
            redirect(base_url() . 'index.php/ribbon/ribbonWithAttachments/' . $id);
        }

        $this->session->set_flashdata('error', 'Something went wrong!');

        redirect(base_url() . 'index.php/ribbon');
    }

}
