<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'userrole');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if ($this->session->userdata('customer_email')) {
      redirect('Admin/');
    }
    $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email', [
      'valid_email' => 'Email Must Be Valid',
      'required' => 'Email Must Be Filled'
    ]);
    $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required', [
      'required' => 'customer_password Must Be Filled'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('layout/auth_header');
      $this->load->view('auth/login');
      $this->load->view('layout/auth_footer');
    } else {
      $this->cek_login();
    }
  }

  public function registrasi()
  {
    if ($this->session->userdata('customer_email')) {
      redirect('Dash');
    }

    $this->form_validation->set_rules('customer_name', 'Customer Name', 'required|trim');
    $this->form_validation->set_rules('customer_email', 'Customer Email', 'required|trim|valid_email|is_unique[user.customer_email]', [
      'is_unique' => 'Email Must Be Unique!',
      'valid_email' => 'Email Must Be Valid!',
      'required' => 'Email Must Be Filled',
    ]);

    $this->form_validation->set_rules(
      'customer_password', 'Customer Password', 'required|min_length[5]',
      [
        'min_length' => 'Customer Password is too short',
        'required' => 'Customer Password Needs to be Fulfilled'
      ]
    );

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Registration';
      $this->load->view('layout/auth_header', $data);
      $this->load->view('auth/registrasi');
      $this->load->view('layout/auth_footer');
    } else {
      $data = [
        'customer_name' => htmlspecialchars($this->input->post('customer_name', true)),
        'customer_email' => htmlspecialchars($this->input->post('customer_email', true)),
        'customer_address' => htmlspecialchars($this->input->post('customer_address', true)),
        'customer_phone' => htmlspecialchars($this->input->post('customer_phone', true)),
        'role' => "User",
        'customer_password' => password_hash($this->input->post('customer_password'), PASSWORD_DEFAULT),
        'date_created' => time()
      ];
      $this->userrole->insert($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="Alert">Congratulations! Your Account has successfully Registered, PLEASE LOGIN!</div>');
      redirect('auth');
    }
  }



  public function cek_login()
  {
    $customer_email = $this->input->post('customer_email');
    $customer_password = $this->input->post('customer_password');
    $user = $this->db->get_where('user', ['customer_email' => $customer_email])->row_array();
    if ($user) {
      if (password_verify($customer_password, $user['customer_password'])) {
        $data = [
          'customer_email' => $user['customer_email'],
          'role' => $user['role'],
          'customer_id' => $user['customer_id'],
        ];
        $this->session->set_userdata($data);
        if ($user['role'] == 'Admin') {
          redirect('Admin/');
        } else {
          redirect('DashUser');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong customer_password!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Not Registered Yet!</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('customer_email');
    $this->session->unset_userdata('role');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Logout!</div>');
    redirect('Auth');
  }
}
