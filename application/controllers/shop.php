<?php
class Shop extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->load->model('products_model');
        $this->load->model('blog_model');
        
        $data['queryProduct'] = $this->products_model->get_last();
        $data['queryBlog'] = $this->blog_model->get_last();
        $data['main_content'] = 'home_view';
        $this->load->view('template', $data);
    }
    
    function checkout()
    {
        $data['title'] = 'Kassa';
        $data['main_content'] = 'checkout_view';
        $this->load->view('template', $data);  
    }
    
    function cart()
    {
        $data['title'] = 'Kundvagn';
        $data['main_content'] = 'cart_view';
        $this->load->view('template', $data);       
    }
    
    function products()
    {
        $this->load->model('products_model');
        
        $data['title'] = 'Våra produkter';
        $data['query'] = $this->products_model->get_all();
        
        $data['main_content'] = 'products_view';
        $this->load->view('template', $data);       
    }
    
    function contact()
    {
        $data['title'] = 'Kontakta oss';
        $data['main_content'] = 'contact_view';
        $this->load->view('template', $data);   
    }
    
    function blog()
    {
        $this->load->model('blog_model');
        
        $data['query'] = $this->blog_model->get_posts();
        
        $data['title'] = 'Bloggen';
        $data['main_content'] = 'blog_view';
        $this->load->view('template', $data);   
    }
    
    function rss()
    {
        $this->load->helper('xml');
        $this->load->model('blog_model', '', TRUE);
        
        $data['encoding'] = 'utf-8';
        $data['feed_name'] = 'Smartprodukt.se';
        $data['feed_url'] = 'http://localhost/rss';
        $data['page_description'] = 'Följ alla uppdatering som görs på Smartprodukt.se';
        $data['page_language'] = 'en-ca';
        $data['creator_email'] = 'info@smartprodukt.se';
        $data['posts'] = $this->blog_model->get_posts();    
        header("Content-Type: application/rss+xml");
        
        
        $this->load->view('rss_view', $data); 
    }
    
    function condition()
    {
        $data['title'] = 'Köpvillkor';
        $data['main_content'] = 'condition_view';
        $this->load->view('template', $data);   
    }
    
    function about()
    {
        $data['title'] = 'Om Smartprodukt';
        $data['main_content'] = 'about_view';
        $this->load->view('template', $data);   
    }
    
    
    
    function newsletter()
    {
        $this->load->library('form_validation');
        $this->load->model('newsletter_model');
        
        $this->form_validation->set_rules('email', 'E-post', 'trim|required|valid_email');
        
        $data = array(
            'email' => $this->input->post('email'),
            'ip' => $_SERVER['REMOTE_ADDR']
        );
        
        if ($this->form_validation->run() == FALSE)
        {
            redirect('/');
        }
        else
        {
            $this->newsletter_model->add_email($data);
            $data['title'] = 'Nyhetsbrev';
            $data['main_content'] = 'newsletter_view';
            $this->load->view('template', $data);  
        }
        
        
    }
    
    
}