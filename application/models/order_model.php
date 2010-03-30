<?php
class Order_model extends Model {
    
    function add_order_products($data)
    {
        $this->db->insert('order_products', $data);
    }
    
    function add_costumer($data)
    {
        $this->db->insert('customers', $data);
    }
    
    function add_order($data)
    {
        $this->db->insert('orders', $data);
    }
    
    function get_order_id()
    {
        $query = $this->db->query('SELECT id FROM orders ORDER BY id DESC LIMIT 1');
        return $query->result_array();
    }
    
    
}