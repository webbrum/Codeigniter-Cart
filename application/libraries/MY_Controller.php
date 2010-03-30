<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends Controller {
	function __construct()
	{
		parent::__construct();
		
		$data['my_class'] = $this; 
		$data['sidebar_products'] = $this->db->get('products');
		$this->load->vars($data);
	}
	
	function total_qty()
	{
		$total_quantity = 0;
		if($this->cart->total_items() > 0)
		{
		    foreach($this->cart->contents() as $items)
		    {
			$total_quantity += $items['qty'];
		    }
		}
		return $total_quantity;
	}
}

?>