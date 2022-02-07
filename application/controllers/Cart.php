<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('WebModel', 'web');
        $this->form_validation->set_error_delimiters('<div class="badge badge-danger">', '</div>');
    }

    public function addProduct()
    {
        $this->data['cartData'] = $this->session->userdata('cartProducts');
        if (empty($this->data['cartData'])) {
            $this->data['cartData'] = $this->firstProduct();
            $this->session->set_userdata('cartProducts', $this->data['cartData']);
            if (!empty($this->data['cartData'])) {
                echo json_encode($this->data['cartData']);
                die();
            } else {
                print_r(0);
            }
            die();
        }

        $key = false;
        if (!empty($this->data['cartData'])) {
            $key = array_search($this->input->post('id'), array_column($this->data['cartData'], 'id'));
        }

//		if (false !== $key) {
//			$this->data['cartData'][$key]['qty'] += 1;
//			$qty = $this->data['cartData'][$key]['qty'];
//			$price = $this->data['cartData'][$key]['single_price'];
//			$this->data['cartData'][$key]['price'] = number_format($price *= $qty, 2, '.', '');
//		}

        if (false === $key) {
            $this->data['cartData'] = array_merge([
                [
                    'id' => $this->input->post('id'),
                    'name' => $this->input->post('name'),
                    'image' => base_url() . $this->input->post('image'),
                    'order_precedence' => $this->input->post('order'),
                    'qty' => 1,
                    'price' => $this->input->post('price'),
                    'single_price' => $this->input->post('price'),
                ]], $this->data['cartData']);
        }

        $this->session->set_userdata('cartProducts', $this->data['cartData']);

        if (!empty($this->data['cartData'])) {
            echo json_encode($this->data['cartData']);
            die();
        } else {
            print_r(0);
            die();
        }
    }

    private function firstProduct()
    {
        return [
            [
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'image' => base_url() . $this->input->post('image'),
                'order_precedence' => $this->input->post('order'),
                'qty' => 1,
                'price' => $this->input->post('price'),
                'single_price' => $this->input->post('price'),
            ]
        ];
    }

    public function getCartItems()
    {
        $this->data['cartData'] = $this->session->userdata('cartProducts');
        if ($this->data['cartData']) {
            echo json_encode($this->data['cartData']);
            die();
        }
        print_r(0);
        die();
    }

    public function removeCartItems()
    {
        $this->data['cartData'] = $this->session->userdata('cartProducts');
        foreach ($this->data['cartData'] as $key => $item) {
            if ($item['id'] == $this->input->get('id')) {
                unset($this->data['cartData'][$key]);
            }
        }

        $this->session->set_userdata('cartProducts', $this->data['cartData']);
        if (!empty($this->data['cartData'])) {
            echo json_encode($this->data['cartData'], true);
            die();
        } else {
            print_r(0);
            die();
        }
    }
    
       public function removeWebCartItem($id)
    {
        $this->data['cartData'] = $this->session->userdata('cartProducts');
        foreach ($this->data['cartData'] as $key => $item) {
            if ($item['id'] == $id) {
                unset($this->data['cartData'][$key]);
            }
        }

        $this->session->set_userdata('cartProducts', $this->data['cartData']);
        if (!empty($this->data['cartData'])) {
            $this->session->set_flashdata('success', 'Successfully Removed');
            redirect(base_url() . 'index.php/preview-ribbons-rack');
        } else {
            $this->session->set_flashdata('error', 'Rack is empty');
            redirect(base_url() . 'index.php/build-your-ribbons-rack');
        }
    }
}
