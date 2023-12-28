<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
        $this->load->library('upload');
        // $this->config->item('upload_path');
        $this->config->load('upload', true);
        $this->load->helper('url');
        $this->load->model('Product_model');
        $this->load->library('cart');
    }

    public function index()
    {
        $data = array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Product_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("admin/home", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data = array();
        $this->load->view("layout/header", $data);
        //   $data['maincontent'] = $this->load->view('admin/vw_produk', $data, true);
        $this->load->view("admin/vw_produk", $data);
        $this->load->view("layout/footer", $data);
    }

    public function save_product()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Product_model->get();

        $this->form_validation->set_rules('product_title', 'Product_Title', 'required', [
            'required' => 'Product Title is Required'
        ]);
        $this->form_validation->set_rules('product_description', 'Product_Description', 'required', [
            'required' => 'Product Description is Required'
        ]);
        $this->form_validation->set_rules('product_price', 'Product_Price', 'required', [
            'required' => 'Product Price is Required'
        ]);
        $this->form_validation->set_rules('product_quantity', 'Product_Quantity', 'required', [
            'required' => 'Product Quantity is Required'
        ]);
        $this->form_validation->set_rules('product_image', 'Product_Image', 'required', [
            'required' => 'Product Image is Required'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("admin/vw_produk", $data);
            $this->load->view("layout/footer", $data);
        } else {
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

            $this->Product_model->insert($product_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The Data Successfully Added!</div>');
            redirect('admin/vw_produk');
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
        redirect('admin/vw_produk');
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
        $data['product_info_by_id'] = $this->Product_model->edit_product_info($id);
        //   $data['maincontent'] = $this->load->view('admin/pages/edit_product', $data, true);
        $this->load->view("layout/header", $data);
        $this->load->view("admin/vw_edit_produk", $data);
        $this->load->view("layout/footer", $data);
    }

    public function update_product($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Product_model->get($id);

        $this->form_validation->set_rules('product_title', 'Product_Title', 'required', [
            'required' => 'Product Title is Required'
        ]);
        $this->form_validation->set_rules('product_description', 'Product_Description', 'required', [
            'required' => 'Product Description is Required'
        ]);
        $this->form_validation->set_rules('product_price', 'Product_Price', 'required', [
            'required' => 'Product Price is Required'
        ]);
        $this->form_validation->set_rules('product_quantity', 'Product_Quantity', 'required', [
            'required' => 'Product Quantity is Required'
        ]);
        $this->form_validation->set_rules('product_image', 'Product_Image', 'required', [
            'required' => 'Product Image is Required'
        ]);

        if ($this->form_validation->run() == false) {
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
            $this->Product_model->update_product_info($id, $product_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The Data Successfully Added!</div>');
            redirect('admin/vw_edit_produk');
        }
    }

    public function delete_product($id)
    {
        $this->Product_model->delete_product_info($id);
        $delete_image = $this->get_image_by_id($id);
        unlink('uploads/' . $delete_image->product_image);
        $result = $this->Product_model->delete_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Product Deleted Sucessfully');
            redirect('admin/vw_fix_produk');
        } else {
            $this->session->set_flashdata('message', 'Product Deleted Failed');
            redirect('admin/vw_fix_produk');
        }
    }

    public function get_user()
    {

        $email = $this->session->userdata('user_email');
        $name = $this->session->userdata('user_name');
        $id = $this->session->userdata('user_id');

        if ($email == false) {
            //   redirect('admin/');
        } else {
            redirect('admin/');
        }

    }



}