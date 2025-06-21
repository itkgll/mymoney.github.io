<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct() {
        parent::__construct();
		check_not_login();
		$this->load->model('transaksi_model');
		$this->load->model('account_model');

    }

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['account'] = $this->account_model->get()->result();
		// $data['invoice'] = $this->transaksi_model->userdata('invoice_no');
		$data['invoice'] = $this->transaksi_model->invoice_no();
		$this->template->load('template', 'transaction/sale_pengeluaran', $data);
	}

	public function pengeluaran()
	{
		$data['username'] = $this->session->userdata('username');
		$this->template->load('template', 'transaction/sale_pemasukan', $data);
	}

	public function simpan()
	{
		$json = json_decode(file_get_contents("php://input"), true);
		$user_id = $this->session->userdata('userid');
		if (!$user_id) {
			show_error('User belum login', 403);
		}
		$this->db->trans_begin();

		try {
			// $invoice_no = $this->generateInvoiceNo(); // Kamu bisa buat auto number
			$invoice = $this->transaksi_model->invoice_no();
			$subtotal_clean = floatval(str_replace(',', '.', str_replace('.', '', $json['subtotal'])));

			$header = [
				'invoice_no' => $invoice,
				'user_id' => (int)$user_id,
				'account_id' => (int)$json['account_id'],
				'transaction_date' => $json['tanggal'],
				'note' => $json['note'],
				'subtotal' => $subtotal_clean, // ✅ AMAN
				'type_transaksi' => $json['type_transaksi'],
				'created_at' => date('Y-m-d H:i:s')
			];
			$this->db->insert('expenses', $header);
			$expense_id = $this->db->insert_id();
			foreach ($json['items'] as $item) {

				$price_clean = floatval(str_replace(',', '.', str_replace('.', '', $item['price'])));
				$total_clean = floatval(str_replace(',', '.', str_replace('.', '', $item['total'])));

				$detail = [
					'expense_id' => $expense_id,
					'item_name' => $item['item_name'],
					'price' => $price_clean,
					'quantity' => $item['quantity'],
					'total' => $total_clean
				];
				$this->db->insert('expense_items', $detail);
			}

			if ($this->db->trans_status() === FALSE) {
				throw new Exception("Database error");
			}

			$sisa_saldo_raw = $json['sisa_saldo'] ?? '0';
			$sisa_saldo_clean = floatval(str_replace(',', '.', str_replace('.', '', $sisa_saldo_raw)));

			$account_id = isset($json['account_id']) ? (int)$json['account_id'] : 0;

			if ($account_id > 0) {
				$this->db->where('id', $account_id);
				$this->db->update('accounts', [
					'balance' => $sisa_saldo_clean
				]);
			} else {
				log_message('error', 'ID akun tidak valid.');
			}
			
			$this->db->trans_commit();
			echo json_encode(['status' => 'success']);
				} catch (Exception $e) {
					$this->db->trans_rollback();
					echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
				}
	}

}
