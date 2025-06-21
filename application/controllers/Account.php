<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Account_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['accounts'] = $this->Account_model->get_all_accounts();
		$this->template->load('template', 'master_data/account_list', $data);
	}

	// Menyimpan data baru
	public function save()
	{
		$data = [
			'account_name' => $this->input->post('account_name'),
			'pemilik' => $this->input->post('pemilik'),
			'kode_akun' => $this->input->post('kode_akun'),
			'balance' => $this->input->post('balance'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status'),
			'join_date' => date('Y-m-d')
		];

		$simpan = $this->db->insert('accounts', $data);
		echo json_encode(['status' => $simpan, 'message' => $simpan ? 'Data berhasil disimpan.' : 'Gagal menyimpan.']);
	}

	// Mengupdate data
	public function update()
	{
		$id = $this->input->post('id');
		$data = [
			'account_name' => $this->input->post('account_name'),
			'pemilik' => $this->input->post('pemilik'),
			'kode_akun' => $this->input->post('kode_akun'),
			'balance' => $this->input->post('balance'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')
		];

		$update = $this->db->where('id', $id)->update('accounts', $data);
		echo json_encode(['status' => $update, 'message' => $update ? 'Data berhasil diperbarui.' : 'Gagal update.']);
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$hapus = $this->db->delete('accounts', ['id' => $id]);

		echo json_encode([
			'status' => $hapus,
			'message' => $hapus ? 'Data berhasil dihapus.' : 'Gagal menghapus data.'
		]);
	}


	public function get_by_id()
	{
		$id = $this->input->post('id');
		$data = $this->db->get_where('accounts', ['id' => $id])->row();
		echo json_encode($data);
	}



}
