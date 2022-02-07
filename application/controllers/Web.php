<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('WebModel', 'web');
        $this->form_validation->set_error_delimiters('<div class="badge badge-danger">', '</div>');
    }
    public function Login(){
        $this->load->view('web/shared/header');
        $this->load->view('auth/login.php');
        $this->load->view('web/shared/footer');
    }

    public function clearRack()
    {
        $this->session->sess_destroy();
        $this->types_branches();
    }

    public function types_branches()
    {
//		$this->data['types'] = $this->web->getAll('type');
        $this->data['branches'] = $this->web->getAll('branch');

        $this->load->view('web/shared/header');
        $this->load->view('web/types_branches', $this->data);
        $this->load->view('web/shared/footer');
    }

    public function getRibbons()
    {
//		$this->form_validation->set_rules('type', 'Ribbon Type', 'required');
        $this->form_validation->set_rules('branch', 'Ribbon Branch', 'required');

        if ($this->form_validation->run() === TRUE) {
            $where = [
                'type_id' => '1',
                'branch_id' => $this->input->post('branch')
            ];

            $this->session->set_userdata('where_ribbon', $where);
            redirect(base_url() . 'index.php/build-your-ribbons-rack');
        }

//		$this->data['types'] = $this->web->getAll('type');
        $this->data['branches'] = $this->web->getAll('branch');

        $this->load->view('web/shared/header');
        $this->load->view('web/types_branches', $this->data);
        $this->load->view('web/shared/footer');
    }

    public function buildRibbonRack()
    {
        $where = $this->session->userdata('where_ribbon');
        if (!$where) {
            $this->session->set_flashdata('error', 'You need to select ribbon type & branch');
            redirect(base_url() . 'index.php/types-branches');
        }

        $this->data['ribbons'] = $this->web->getAllRibbonsWhere($where);

        foreach ($this->data['ribbons'] as $key => $item) {
            $this->data['ribbons'][$key]->attachments = $this->web->getRibbonAttachments($item->id);
        }

        $this->load->view('web/shared/header');
        $this->load->view('web/build_ribbon_rack', $this->data);
        $this->load->view('web/shared/footer');
    }

    public function previewAttachment()
    {
        $this->data['cartData'] = $this->session->userdata('cartProducts');
        if (!$this->data['cartData']) {
            $this->session->set_flashdata('error', 'You need to select ribbon type & branch');
            redirect(base_url() . 'index.php/types-branches');
        }

        foreach ($this->data['cartData'] as $key => $item) {
            $this->data['cartData'][$key]['attachments'] = $this->web->getRibbonAttachments($item['id']);
            if (!empty($this->data['cartData'][$key]['attachments'])) {
                foreach ($this->data['cartData'][$key]['attachments'] as $attachKey => $attachment) {
                    $this->data['cartData'][$key]['attachments'][$attachKey]->select_options = $this->web->getAttachmentOptions($attachment->id);
                }
            }
        }

        $this->sortArray();
        $this->data['jsonRibbon'] = json_encode($this->data['cartData'], true);
        $this->data['totalRibbons'] = count($this->data['cartData']);

        $this->load->view('web/shared/header');
        $this->load->view('web/preview_ribbon_rack', $this->data);
        $this->load->view('web/shared/footer');
    }

    private function sortArray()
    {
        $array = array_column($this->data['cartData'], 'order_precedence');
        array_multisort($array, SORT_ASC, $this->data['cartData']);
    }

    public function checkout()
    {
        $this->data['attachments'] = [];
        $this->data['data'] = $this->input->post();
        $this->data['cartData'] = $this->session->userdata('cartProducts');
        $this->checkCart();

        if (isset($this->data['data']['ribbon_attachment'])) {
            foreach ($this->data['data']['ribbon_attachment'] as $ribbon => $array) {
                foreach ($array as $key => $value) {
                    $qty = explode(',', $value);

                    if ($qty[0] > 0) {
                        $this->data['attachments'][$ribbon][$key] = $this->web->getAttachment($key)[0];
                        $this->data['attachments'][$ribbon][$key]->qty = $qty[0];
                        if ($qty[1] > 0) {
                            if ($this->data['attachments'][$ribbon][$key]->multiple === '1') {
                                $this->data['attachments'][$ribbon][$key]->selected_option = $this->web->getAttachmentOption($qty[1]);
                            }
                        }
                    }
                }
            }
            $this->session->set_userdata('ribbonsAttachments', $this->data['attachments']);
        }

        $this->load->view('web/shared/header');
        $this->load->view('web/checkout', $this->data);
        $this->load->view('web/shared/footer');
    }

    private function checkCart()
    {
        if (!$this->data['cartData']) {
            $this->session->set_flashdata('error', 'You need to select ribbon type & branch');
            redirect(base_url() . 'index.php/types-branches');
        }
    }

    public function submitOrder()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('post_code', 'Post Code', 'required');
        $this->form_validation->set_rules('payment_data', 'Payment Data', 'required');
        $this->form_validation->set_rules('ribbon_stack_image', 'Ribbon Stack Image', 'required');

        if ($this->form_validation->run() === TRUE) {

            $this->data['finalData'] = $this->setDataArray();
            $this->data['id'] = $this->web->insertOrder($this->data['finalData']);

            if (!$this->data['id']) {
                $this->session->set_flashdata('error', 'Something Went Wrong with the order, Please Contact to support.');
                redirect(base_url() . 'index.php/preview-ribbons-rack');
            } else {

                unset($_SESSION['cartProducts']);
                $this->session->set_flashdata('success', 'Order Successfully Created');
                $this->load->view('web/shared/header');
                $this->load->view('web/thankyou', $this->data);
                $this->load->view('web/shared/footer');
            }

        } else {
            $this->session->set_flashdata('error', 'Something Went Wrong with the system, Please Contact to support.');
            redirect(base_url() . 'index.php/preview-ribbons-rack');
        }
    }

    private function setDataArray()
    {
        $this->data['data'] = $this->input->post();
        $this->data['cartData'] = $this->setRibbonsAttachmentsData();
        $this->checkCart();
        $this->data['payment_data'] = $this->setPaymentData();

        $data = [
            'ribbon_image' => $this->data['data']['ribbon_stack_image'],
            'cart_data' => json_encode($this->data['cartData'], true),
            'payment_data' => json_encode($this->data['payment_data'], true),
        ];

        $this->removeKeysFromArray();
        return array_merge($data, $this->data['data']);
    }

    private function removeKeysFromArray()
    {
        unset($this->data['data']['ribbon_stack_image']);
        unset($this->data['data']['payment_data']);
    }

    private function setRibbonsAttachmentsData()
    {
        $this->data['ribbons_data'] = $this->session->userdata('cartProducts');
        $this->data['attachments_data'] = $this->session->userdata('ribbonsAttachments');

        $ids = [];
        $i = 0;
        foreach ($this->data['ribbons_data'] as $key => $ribbons) {
            $ids[$i]['ribbons'] = $ribbons['id'];

            if (isset($this->data['attachments_data'][$ribbons['id']])) {
                $a = 0;
                foreach ($this->data['attachments_data'][$ribbons['id']] as $attachment) {
                    $ids[$i]['attachments'][$a]['id'] = $attachment->id;
                    $ids[$i]['attachments'][$a]['qty'] = $attachment->qty;

                    if ($attachment->multiple == 1) {
                        $ids[$i]['attachments'][$a]['selected_option'] = $attachment->selected_option[0]->id;
                    }
                    $a++;
                }
            }
            $i++;
        }
        return $ids;
    }

    private function setPaymentData()
    {
        $data = json_decode($this->data['data']['payment_data'], true);

        return [
            'id' => $data['id'],
            'status' => $data['status'],
            'links' => $data['links'][0]['href'],
            'payments' => $data['purchase_units'][0]["payments"]['captures'][0],
            'amount' => $data['purchase_units'][0]['amount']
        ];
    }

    public function thankYou()
    {
        $this->load->view('web/shared/header');
        $this->load->view('web/thankyou');
        $this->load->view('web/shared/footer');
    }
}
