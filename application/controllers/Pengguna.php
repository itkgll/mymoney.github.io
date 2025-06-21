<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
    }

	public function index()
	{
		$data['users'] = $this->User_model->get_all_users();
		$this->template->load('template', 'master_data/pengguna_list', $data);
	}
}
