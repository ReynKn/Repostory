<?php

class Orders_Model extends CI_Model
{

    public function manage_order_info()
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('user', 'user.customer_id = orders.customer_id');
        $this->db->join('shipping', 'shipping.shipping_id = orders.shipping_id');
        $result = $this->db->get();

        if ($result === false) {
            echo $this->db->error()['message'];
        } else {
            return $result->result();
        }
    }

    public function order_info_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('order_id', $order_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function customer_info_by_id($customer_id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('customer_id', $customer_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function shipping_info_by_id($shipping_id)
    {
        $this->db->select('*');
        $this->db->from('shipping');
        $this->db->where('shipping_id', $shipping_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function payment_info_by_id($payment_id)
    {
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where('payment_id', $payment_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function order_details_info_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('order_detail');
        $this->db->where('order_id', $order_id);
        $result = $this->db->get();
        return $result->result();
    }

}
