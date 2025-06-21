<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
    {

    public function get_accounts()
    {
        return $this->db->get('accounts')->result();
    }

    public function get_filtered_report($account_id, $jenis_transaksi, $start_date, $end_date)
    {
        $this->db->select('
            e.invoice_no, e.transaction_date, e.note, e.subtotal,
            e.type_transaksi, e.jenis_transaksi, 
            a.account_name,
            ei.item_name, ei.price, ei.quantity, ei.total
        ');
        $this->db->from('expenses e');
        $this->db->join('expense_items ei', 'e.id = ei.expense_id', 'left');
        $this->db->join('accounts a', 'e.account_id = a.id', 'left');

        if ($account_id) {
            $this->db->where('e.account_id', $account_id);
        }

        if ($jenis_transaksi) {
            $this->db->where('e.jenis_transaksi', $jenis_transaksi);
        }

        if ($start_date) {
            $this->db->where('e.transaction_date >=', $start_date);
        }

        if ($end_date) {
            $this->db->where('e.transaction_date <=', $end_date);
        }

        $this->db->order_by('e.transaction_date', 'DESC');
        return $this->db->get()->result();
    }


}