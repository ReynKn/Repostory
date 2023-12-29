<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Product_model extends CI_Model
{
  public $table = 'product';
  public $id = 'product.id';

  public function __construct()
  {
    parent::__construct();
    $this->load->model('product_model');
  }
  public function get()
  {
    $this->db->from($this->table);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function insert($data)
  {
    return $this->db->insert('product', $data);
  }
  public function get_all_product()
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->order_by('product_id', 'DESC');
    $info = $this->db->get();
    return $info->result();
  }

  public function edit($id)
  {
    $this->db->where('product_id', $id);
    $info = $this->db->get('product');
    return $info->row();
  }

  public function delete($id)
  {
    $this->db->where('product_id', $id);
    return $this->db->delete('product');
  }

  public function update($where, $data)
  {
    $this->db->update('product_id', $data, $where);
    return $this->db->affected_rows();
  }
  public function save_product_info($product_data)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('product_title', 'Title', 'required');
    $this->form_validation->set_rules('product_description', 'Description', 'required');
    $this->form_validation->set_rules('product_image', 'Image', 'required');
    $this->form_validation->set_rules('product_price', 'Price', 'required|numeric');
    $this->form_validation->set_rules('product_quantity', 'Quantity', 'required|numeric');
    $this->form_validation->set_rules('product_feature', 'Feature', 'required|numeric');

    if (!$this->form_validation->run()) {
      return false;
    }
    $insert_data = [
      'product_title' => $product_data['product_title'],
      'product_description' => $product_data['product_description'],
      'product_image' => $product_data['product_image'],
      'product_price' => $product_data['product_price'],
      'product_quantity' => $product_data['product_quantity'],
      'product_feature' => $product_data['product_feature'],
    ];
    return $this->db->insert('product', $insert_data);
  }

}
