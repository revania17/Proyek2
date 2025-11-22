<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PesananModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class DownloadLaporan extends BaseController
{

    public function exportPDF()
    {
        $pesananModel = new PesananModel();
        $data = $pesananModel->getLaporan();

        // Load view khusus PDF (nanti kita buat)
        $html = view('laporan_pdf', ['data' => $data]);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('laporan_penjualan.pdf', ["Attachment" => 1]);
    }


    public function exportExcel()
    {
        $pesananModel = new PesananModel();
        $data = $pesananModel->getLaporan(); // Ambil data pesanan yang sudah selesai

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul Laporan
        $sheet->mergeCells('A1:H1');
        $sheet->setCellValue('A1', 'Laporan Penjualan Creative Cell');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        // Header Tabel
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Nama Pemesan');
        $sheet->setCellValue('C3', 'Nama Produk');
        $sheet->setCellValue('D3', 'Provider');
        $sheet->setCellValue('E3', 'Deskripsi');
        $sheet->setCellValue('F3', 'Harga Produk');
        $sheet->setCellValue('G3', 'Nomor Telepon');
        $sheet->setCellValue('H3', 'Tanggal Pesanan');

        // Styling header
        $sheet->getStyle('A3:H3')->getFont()->setBold(true);
        $sheet->getStyle('A3:H3')->getAlignment()->setHorizontal('center');

        // Isi Data
        $row = 4;
        $no = 1;
        foreach ($data as $d) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $d['nama_lengkap']);
            $sheet->setCellValue('C' . $row, $d['nama_produk']);
            $sheet->setCellValue('D' . $row, $d['provider']);
            $sheet->setCellValue('E' . $row, $d['deskripsi']);
            $sheet->setCellValue('F' . $row, $d['harga_produk']);
            $sheet->setCellValue('G' . $row, $d['nomor_telepon']);
            $sheet->setCellValue('H' . $row, $d['dibuat']);
            $row++;
        }

        // Total Pendapatan
        $sheet->mergeCells('A' . $row . ':E' . $row);
        $sheet->setCellValue('A' . $row, 'Total Pendapatan');
        $sheet->setCellValue('F' . $row, '=SUM(F4:F' . ($row - 1) . ')');

        // Styling total pendapatan
        $sheet->getStyle('A' . $row . ':F' . $row)->getFont()->setBold(true);
        $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal('right');

        // Format rupiah untuk total
        $sheet->getStyle('F' . $row)
            ->getNumberFormat()
            ->setFormatCode('"Rp" #,##0');

        // Border Tabel
        $sheet->getStyle('A3:H' . $row)
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Auto width
        foreach (range('A', 'H') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Export ke Excel
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'laporan_penjualan.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
