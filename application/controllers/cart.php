<?php
class Cart extends MY_Controller {
    
    function index()
    {
        $data['title'] = 'Kundvagn';
        $data['main_content'] = 'cart_view';
        $this->load->view('template', $data);
    }
    
    function add()
    {
        $this->load->model('products_model');
        $q = $this->products_model->get_product()->result_array();
        $update = FALSE;
        
        foreach($this->cart->contents() as $item)
        {
            if($item['id'] == $this->uri->segment(3))
            {
                $data = array(
                    'id' => $q[0]['id'],
                    'qty' => $item['qty']+1,
                    'price' => $q[0]['price'],
                    'name' => $q[0]['name']
                );
                $this->cart->insert($data);
                $update = TRUE;
            }
        }
        
        if($update != TRUE)
        {
            $data = array(
                'id' => $q[0]['id'],
                'qty' => 1,
                'price' => $q[0]['price'],
                'name' => $q[0]['name']
            );
            $this->cart->insert($data);
        }
        
        //redirect('/product/id/'.$q[0]['id'].'');
        redirect('/cart');
    }
    
    function empty_cart()
    {
        $this->cart->destroy();
        redirect('/cart');
    }
    
    function remove()
    {
        $data = array(
            'rowid' => $this->uri->segment(3),
            'qty' => 0
        );
        $this->cart->update($data);
        
        redirect('/cart');  
    }
    
    function update()
    {   
        for($i=1; $i<=$this->cart->total_items(); $i++)
        {
            $item = $this->input->post($i);
            $data = array(
                'rowid' => $item['rowid'],
                'qty' => $item['qty']
            );
            $this->cart->update($data);
        }
        redirect('/cart');
    }
    
    
}