<?php
class Checkout extends MY_Controller {
    
    function index()
    {
        $data['title'] = 'Kassa';
        $data['main_content'] = 'checkout_view';
        $this->load->view('template', $data);
    }
    
    function confirm()
    {
        if($this->cart->total_items() > 0){
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('first_name', 'Förnamn', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Efternamn', 'trim|required');
            $this->form_validation->set_rules('address', 'Adress', 'trim|required');
            $this->form_validation->set_rules('city', 'Ort', 'trim|required');
            $this->form_validation->set_rules('postcode', 'Postnummer', 'trim|required');
            $this->form_validation->set_rules('phone', 'Telefon', 'trim');
            $this->form_validation->set_rules('email', 'E-post', 'trim|required|valid_email');
            $this->form_validation->set_rules('company', 'Företag', 'trim');
            $this->form_validation->set_rules('pay_type', 'Betalsätt', 'trim');
            $this->form_validation->set_rules('advice_type', 'Avisering', 'trim');
            
            $this->form_validation->set_rules('number_advice', 'SMS-nummer', 'trim');
            
            if ($this->form_validation->run() == FALSE)
            {
                $data['title'] = 'Kassa';
                $data['main_content'] = 'checkout_view';
                $this->load->view('template', $data);
            }
            else
            {
                
                $postdata = array(
                       'first_name'  => $this->input->post('first_name'),
                       'last_name'     => $this->input->post('last_name'),
                       'address' => $this->input->post('address'),
                       'city' => $this->input->post('city'),
                       'postcode' => $this->input->post('postcode'),
                       'email' => $this->input->post('email'),
                       'number_advice' => $this->input->post('number_advice'),
                       'company' => $this->input->post('company'),
                       'phone' => $this->input->post('phone'),
                       'pay_type' => $this->input->post('pay_type')
                   );
                
                $this->session->set_userdata($postdata);
                
                $data['title'] = 'Bekräfta beställning';
                $data['main_content'] = 'confirm_view';
                $this->load->view('template', $data);
            }
        }
        else
        {
            redirect('/');
        }
    }
    
    
    
    function finish()
    {
        if($this->cart->total_items() > 0){
            $data['title'] = 'Tack för din beställning!';
            $this->load->model('order_model');
            
            $order_data = array(
                   'total'  => $this->cart->total()+49+49,
                   'date'     => date('Y-m-d H:i:s')
               );
            $this->order_model->add_order($order_data);
            $q = $this->order_model->get_order_id();
            
            $costumer_data = array(
                   'first_name'  => $this->session->userdata('first_name'),
                   'last_name'     => $this->session->userdata('last_name'),
                   'address' => $this->session->userdata('address'),
                   'city' => $this->session->userdata('city'),
                   'postcode' => $this->session->userdata('postcode'),
                   'email' => $this->session->userdata('email'),
                   'number_advice' => $this->session->userdata('number_advice'),
                   'company' => $this->session->userdata('company'),
                   'phone' => $this->session->userdata('phone'),
                   'order_id' => $q[0]['id'],
                   'ip' => $_SERVER['REMOTE_ADDR']
               );
            $this->order_model->add_costumer($costumer_data);
            
            
            foreach($this->cart->contents() as $row){
                
                $products_data = array(
                       'name'  => $row['name'],
                       'price'  => $row['price'],
                       'quantity'  => $row['qty'],
                       'product_id'  => $row['id'],
                       'order_id' => $q[0]['id']
                   );
                $this->order_model->add_order_products($products_data);
            }
            $header = "From: info@smartprodukt.se\r\n"; //optional headerfields
            mail($costumer_data['email'], 'Tack för din beställning!', 'Vi har nu mottagit din beställning och kommer att behandla den inom de närmaste 24 timmarna.', $header);
            mail('glenn.sjostrom@gmail.com', 'Ny beställning', 'Ny beställning gjord.');
            $this->cart->empty_cart();
            $data['main_content'] = 'finish_view';
            $this->load->view('template', $data);
        }
        else
        {
            redirect('/');
        }
    }
    
    
    
    
    
    
}