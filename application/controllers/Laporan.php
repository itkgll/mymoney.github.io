<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index()
    {
        $this->load->model('Laporan_model');

        $data['accounts'] = $this->Laporan_model->get_accounts();

        $account_id = $this->input->get('account_id');
        $jenis_transaksi = $this->input->get('jenis_transaksi');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        if ($account_id || $jenis_transaksi || $start_date || $end_date) {
            $data['report'] = $this->Laporan_model->get_filtered_report($account_id, $jenis_transaksi, $start_date, $end_date);
        } else {
            $data['report'] = [];
        }
        $this->template->load('template', 'laporan/laporan', $data);
    }

    // export

    public function export_excel()
    {
        $this->load->library('excel');

        $account_id = $this->input->get('account_id');
        $jenis_transaksi = $this->input->get('jenis_transaksi');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        $data = $this->Laporan_model->get_filtered_report($account_id, $jenis_transaksi, $start_date, $end_date);

        // Load PHPExcel
        require_once APPPATH.'third_party/Classes/PHPExcel.php';
        $excel = new PHPExcel();

        $excel->setActiveSheetIndex(0);
        $sheet = $excel->getActiveSheet();
        $sheet->setTitle('Laporan Transaksi');

        // Header
        $headers = ['Invoice', 'Tanggal', 'Akun', 'Jenis', 'Tipe', 'Subtotal', 'Catatan', 'Item', 'Harga', 'Qty', 'Total'];
        $col = 'A';
        foreach ($headers as $head) {
            $sheet->setCellValue($col.'1', $head);
            $col++;
        }

        // Data
        $row = 2;
        foreach ($data as $r) {
            $sheet->setCellValue('A'.$row, $r->invoice_no);
            $sheet->setCellValue('B'.$row, $r->transaction_date);
            $sheet->setCellValue('C'.$row, $r->account_name);
            $sheet->setCellValue('D'.$row, $r->jenis_transaksi);
            $sheet->setCellValue('E'.$row, $r->type_transaksi);
            $sheet->setCellValue('F'.$row, $r->subtotal);
            $sheet->setCellValue('G'.$row, $r->note);
            $sheet->setCellValue('H'.$row, $r->item_name);
            $sheet->setCellValue('I'.$row, $r->price);
            $sheet->setCellValue('J'.$row, $r->quantity);
            $sheet->setCellValue('K'.$row, $r->total);
            $row++;
        }

        // Output ke browser
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan_Transaksi.xls"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $writer->save('php://output');
        exit;
    }

}
