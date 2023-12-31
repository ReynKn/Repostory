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
    $this->db->where($where);
    $this->db->update('product', $data);
    return $this->db->affected_rows();
  }
  public function save_product_info($product_data)
  {
    $this->db->insert('product', $product_data);
    return $this->db->insert_id();
  }

  public function get_all_search_product($search)
  {
      $this->db->select('*');
      $this->db->from('product');
      $this->db->order_by('product.product_id', 'DESC');
      $this->db->like('product.product_title', $search, 'both');
      $this->db->or_like('product.product_description', $search, 'both');
      $info = $this->db->get();
      return $info->result();
  }


}
