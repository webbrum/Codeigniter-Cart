<?php
class Product extends MY_Controller {
    
    function index()
    {
        $data['main_content'] = 'home_view';
        $this->load->view('template', $data);    
    }
    
    function show_product()
    {
        $this->load->model('products_model');
        $data['query'] = $this->products_model->get_product();
        
        if($this->products_model->get_product()->num_rows() > 0)
        {
            $product = $this->products_model->get_product()->result_array();
            $data['title'] = $product[0]['name'];
            $data['main_content'] = 'product_view';
            $this->load->view('template', $data);        
        }
        else
        {
            $data['main_content'] = 'home_view';
            $this->load->view('template', $data);       
        }
        

    }
    
    
    
}