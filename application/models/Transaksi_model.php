<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function invoice_no() 
    {
        // Mulai transaksi untuk mencegah race condition
        $this->db->trans_start();

        // Dapatkan format YYMMDD
        $datePart = date('ymd');

        // Lock tabel agar tidak terjadi race condition
        $sql = "
            SELECT MAX(CAST(RIGHT(invoice_no, 4) AS INT)) AS max_no
            FROM dbo.expenses WITH (TABLOCKX)
            WHERE SUBSTRING(invoice_no, 5, 6) = ?

        ";

        $query = $this->db->query($sql, [$datePart]);

        if ($query->num_rows() > 0 && $query->row()->max_no !== null) {
            $n = ((int)$query->row()->max_no) + 1;
            $no = str_pad($n, 4, '0', STR_PAD_LEFT);
        } else {
            $no = "0001";
        }

        $invoice = "INV-" . $datePart . $no;

        $this->db->trans_complete();

        return $invoice;
    }

}
