<?php
class Blog_model extends Model {
    
    function get_posts()
    {
        $this->db->order_by('datetime', 'desc');
        $q = $this->db->get('blog');
        return $q;
    }
    
    function get_last()
    {
        $q = $this->db->query('SELECT * FROM blog ORDER BY id DESC LIMIT 1');
        return $q;
    }
    
    
    
}