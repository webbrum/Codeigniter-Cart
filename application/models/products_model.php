<?php
class Products_model extends Model {
    
    function get_product()
    {
        $this->db->where('id', $this->uri->segment(3));
        $q = $this->db->get('products');
        return $q;
    }
    
    function get_all()
    {
        $q = $this->db->get('products');
        return $q;
    }
    
    function get_last()
    {
        $q = $this->db->query('SELECT * FROM products ORDER BY id DESC LIMIT 1');
        return $q;
    }
    
    
}