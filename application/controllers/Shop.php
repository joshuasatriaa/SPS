<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function index()
	{
		$this->load->view('v_shop');
	}

	public function add_item()
	{
		$this->load->view('v_shop_add_item');
	}
}
