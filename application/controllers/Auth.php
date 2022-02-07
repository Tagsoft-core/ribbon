<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('AuthModel', 'auth');
        $this->form_validation->set_error_delimiters('<div class="badge badge-danger">', '</div>');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === TRUE) {
            $this->data['credentials'] = [
                'email' => $this->input->post('email'),
                'password' => $this->hash_password($this->input->post('password'))
            ];

            $this->data['loggedIn'] = $this->auth->checkUser($this->data['credentials']);

            if ($this->data['loggedIn']) {
                $this->data['sessionData'] = [
                    'id' => $this->data['loggedIn']->id,
                    'email' => $this->data['loggedIn']->email,
                    'loggedIn' => TRUE
                ];
                $this->session->set_userdata($this->data['sessionData']);
                return redirect(base_url() . 'index.php/dashboard/');
            } else {
                $this->session->set_flashdata('error', 'Credentials not correct');
                $this->load->view('auth/login');
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    private function hash_password($password)
    {
        return md5($password);
    }

    public function logout()
    {
	    
    }

}
