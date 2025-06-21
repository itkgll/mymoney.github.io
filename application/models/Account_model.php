<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

    public function get_all_accounts() {
        // Ambil semua data dari tabel accounts
        return $this->db->get('accounts')->result();
    }

    public function get_all_expense_items() {
        return $this->db->get('expense_items')->result();
    }

    public function get_all_expenses() {
        return $this->db->get('expenses')->result();
    }


    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('accounts');
        if ($id != null) {
            $this->db->where('id', 'balance', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    // public function insert($data)
    // {
    //     $this->db->insert('accounts', $data);
    // }
}
