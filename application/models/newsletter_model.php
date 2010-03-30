<?php
class Newsletter_model extends Model {
    
    function add_email($data)
    {
        $this->db->insert('newsletter', $data);
    }    
    
}