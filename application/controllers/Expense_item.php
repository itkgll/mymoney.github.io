<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_item extends CI_Controller {

	public function __construct() {
        parent::__construct();
        // check_not_login(); // Panggil fungsi cek login
		$this->load->model('Account_model');
    }

	public function index()
	{
		// check_not_login();
        $data['expense_items'] = $this->Account_model->get_all_expense_items();
		
		$this->template->load('template', 'master_data/expense_item', $data);
	}

	public function expenses() 
	{
		$data['expenses'] = $this->Account_model->get_all_expenses();
		$this->template->load('template', 'master_data/expenses', $data);
	}
}
