<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('redirect_helper');
        // $this->get_user();
        $this->load->library('upload');
        // $this->config->item('upload_path');
        $this->config->load('upload', true);
        $this->load->helper('url');
        $this->load->model('Product_model');
        $this->load->model('Orders_model');
        $this->load->library('cart');

    }

    public function index()
    {
        $data = array();
        $this->load->view("layout/header", $data);
        $this->load->view("admin/home", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data = array();
        $this->load->view("layout/header", $data);
        // $data['maincontent'] = $this->load->view('admin/vw_produk', $data, true);
        $this->load->view("admin/vw_produk", $data);
        $this->load->view("layout/footer", $data);
    }

    public function save_product()
    {
        $product_data = [
            'product_title' => $this->input->post('product_title'),
            'product_description' => $this->input->post('product_description'),
            'product_price' => $this->input->post('product_price'),
            'product_quantity' => $this->input->post('product_quantity'),
            'product_feature' => $this->input->post('product_feature'),
        ];
        // Handle file upload
        $upload_image = $_FILES['product_image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('product_image')) {
                $new_image = $this->upload->data('file_name');
                $product_data['product_image'] = $new_image;
            } else {
                echo $this->upload->display_errors();
            }
        }
        $result = $this->Product_model->save_product_info($product_data);

        if ($result) {
            $this->session->set_flashdata('message', 'The Data Successfully Added!');
            redirect('admin/tambah');
        } else {
            $this->session->set_flashdata('message', 'The Data Failed to be Added!');
            redirect('admin/tambah');
        }
    }

    function upload()
    {
        $data = [
            'product_title' => $this->input->post('product_title'),
            'product_description' => $this->input->post('product_description'),
            'product_image' => $this->input->post('product_image'),
            'product_price' => $this->input->post('product_price'),
            'product_quantity' => $this->input->post('product_quantity'),
            'product_feature' => $this->input->post('product_feature'),
        ];
        $this->Product_model->insert($data);
        $this->Product_model->save_product_info($data);
        redirect('admin/vw_fix_produk');
    }

    public function tampil_produk()
    {
        $data = array();
        $this->load->model('Product_model');
        $data['get_all_product'] = $this->Product_model->get_all_product();
        // $data['maincontent'] = $this->load->view('admin/vw_fix_produk', $data, true);
        $this->load->view('layout/header', $data);
        $this->load->view('admin/vw_fix_produk', $data);
        $this->load->view('layout/footer', $data);

    }
    public function edit_product($id)
    {
        $data = array();
        $data['product_info_by_id'] = $this->Product_model->edit($id);
        // $data['maincontent'] = $this->load->view('admin/vw_edit_produk', $data, true);
        $this->load->view("layout/header", $data);
        $this->load->view("admin/vw_edit_produk", $data);
        $this->load->view("layout/footer", $data);
    }

    public function update_product($id)
    {
        // $data['product_info_by_id'] = $this->Product_model->edit($id);
        // $this->Product_model->save_product_info($data);
        // $data['product'] = $this->Product_model->get();

        $this->form_validation->set_rules('product_title', 'Product_Title', 'required');
        $this->form_validation->set_rules('product_description', 'Product_Description', 'required');
        $this->form_validation->set_rules('product_price', 'Product_Price', 'required');
        $this->form_validation->set_rules('product_quantity', 'Product_Quantity', 'required');
        $this->form_validation->set_rules('product_image', 'Product_Image', 'required');

        if ($this->form_validation->run() == false) {
            $data['product_info_by_id'] = $this->Product_model->edit($id);
            $this->load->view("layout/header", $data);
            $this->load->view("admin/vw_edit_produk", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $product_data = array(
                'product_title' => $this->input->post('product_title'),
                'product_description' => $this->input->post('product_description'),
                'product_price' => $this->input->post('product_price'),
                'product_quantity' => $this->input->post('product_quantity'),
                'product_feature' => $this->input->post('product_feature'),
            );

            $product_delete_image = $this->input->post('product_delete_image');

            $upload_image = $_FILES['product_image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './uploads/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('product_image')) {
                    $new_image = $this->upload->data('file_name');
                    $product_data['product_image'] = $new_image;
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Product_model->update(array('product_id' => $id), $product_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The Data Successfully Added!</div>');
            redirect('admin/vw_fix_produk');
        }
    }
    public function delete_product($id)
    {
        $product = $this->Product_model->get_image_by_id($id);
        if ($product) {
            unlink('uploads/' . $product->product_image);
            $result = $this->Product_model->delete($id);

            if ($result) {
                $this->session->set_flashdata('message', 'Product Deleted Successfully');
            } else {
                $this->session->set_flashdata('message', 'Product Deleted Failed');
            }
        } else {
            $this->session->set_flashdata('message', 'Product not found');
        }

        redirect('admin/vw_fix_produk');
    }

    public function get_user()
    {

        $email = $this->session->userdata('user_email');
        $name = $this->session->userdata('user_name');
        $id = $this->session->userdata('user_id');

        if ($email == false) {
            redirect('auth/login/');
        } else {
            if ($this->session->userdata('user_email')) {
                redirect('admin/');
            }
        }

        exit();
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_name');
    }

    public function manage_order()
    {
        $data = array();
        $this->load->view("layout/header", $data);
        $data['all_manage_order_info'] = $this->Orders_model->manage_order_info();
        $this->load->view("admin/orders", $data);
        $this->load->view("layout/footer", $data);
    }

    public function order_details($order_id)
    {
        $data = array();
        $this->load->view("layout/header", $data);
        $order_info = $this->Orders_model->order_info_by_id($order_id);
        $customer_id = $order_info->customer_id;
        $shipping_id = $order_info->shipping_id;
        $payment_id = $order_info->payment_id;

        $data['customer_info'] = $this->Orders_model->customer_info_by_id($customer_id);
        $data['shipping_info'] = $this->Orders_model->shipping_info_by_id($shipping_id);
        $data['payment_info'] = $this->Orders_model->payment_info_by_id($payment_id);
        $data['order_details_info'] = $this->Orders_model->order_details_info_by_id($order_id);
        $data['order_info'] = $this->Orders_model->order_info_by_id($order_id);
        $this->load->view("admin/order_detail", $data);
        $this->load->view("layout/footer", $data);
    }


}