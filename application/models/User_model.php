<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_all_users() {
        // Ambil semua data kecuali password_hash
        $this->db->select('id, username, full_name, role, alamat, created_at');
        $this->db->from('users');
        return $this->db->get()->result();
    }

    public function get_user($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row(); // return single user
    }

    
}

