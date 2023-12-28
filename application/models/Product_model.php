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
  }
  public function get($id)
  {
    $this->db->from($this->table);
    $this->db->where('id', $id); 
    $query = $this->db->get();
  
    return $query->row();
    }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id('product', $data);
  }
  public function get_all_product()
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->order_by('product_id', 'DESC');
    $info = $this->db->get();
    return $info->result();
  }

  public function edit_product_info($id)
  {
    // $this->db->select('product_id, product_title, product_description, product_image, product_price, product_quantity, product_feature, created_at');
    $this->db->select('*');
    $this->db->from('product');
    $this->db->where('product_id', $id);
    $info = $this->db->get();
    return $info->row();
  }

  public function delete_product_info($id)
  {
    $this->db->where('product_id', $id);
    return $this->db->delete('product');
  }

  public function update_product_info($id, $data)
  {
    $this->db->where('product_id', $id);
    return $this->db->update('product', $data);
  }

}
